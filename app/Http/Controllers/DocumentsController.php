<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class DocumentsController extends Controller
{
    /**
     * Display the documents upload form.
     */
    public function index()
    {
        $exist = Documents::where('userid', Auth::user()->id)->first();
        if (!is_null($exist)) {
            return redirect()->route('finished.index');
        }
        return view('academics.documents');
    }

    /**
     * Store the uploaded documents.
     */

     public function store(Request $request)
     {
         // Validate the uploaded files
         $validatedData = $request->validate([
             'id_documents' => 'required|file',
             'certificates' => 'required|file',
             'dissertation_proposal' => 'required|file',
         ]);

         try {
             // Upload and store the files
             $idDocumentsPath = $request->file('id_documents')->store('public/documents');
             $certificatesPath = $request->file('certificates')->store('public/documents');
             $proposalPath = $request->file('dissertation_proposal')->store('public/documents');

             // Retrieve the original file names
             $idDocumentsName = $request->file('id_documents')->getClientOriginalName();
             $certificatesName = $request->file('certificates')->getClientOriginalName();
             $proposalName = $request->file('dissertation_proposal')->getClientOriginalName();

             // Move the uploaded files to the desired location with the original names
             $request->file('id_documents')->move(public_path('storage/documents'), $idDocumentsName);
             $request->file('certificates')->move(public_path('storage/documents'), $certificatesName);
             $request->file('dissertation_proposal')->move(public_path('storage/documents'), $proposalName);

             // Create a new record in the database
             $documents = new Documents();
             $documents->userid = Auth::id();
             $documents->id_documents = 'documents/'.$idDocumentsName;
             $documents->certificates = 'documents/'.$certificatesName;
             $documents->dissertation_proposal = 'documents/'.$proposalName;
             $documents->save();

             return redirect()->route('finished.index')->with('Message', 'Thank you for applying with Midlands State University');
         } catch (Exception $e) {
             return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
         }
     }




    /**
     * Download a specific document.
     */
    public function download($filename)
    {
        $document = Documents::where('certificates', $filename)
            ->orWhere('id_documents', $filename)
            ->orWhere('dissertation_proposal', $filename)
            ->first();

        if ($document) {
            $file = public_path('storage/' . $filename);
            if (file_exists($file)) {
                return response()->download($file);
            }
        }

        abort(404);
    }


    private function getDocumentFilePath($document, $filename)
    {
        $fileColumns = ['certificates', 'id_documents', 'dissertation_proposal'];

        foreach ($fileColumns as $column) {
            if ($document->{$column} === $filename) {
                $file = public_path('storage/documents/' . $document->{$column});
                if (file_exists($file)) {
                    return $file;
                }
            }
        }

        return null;
    }


}
