<?php

namespace App\Http\Livewire;

use App\Models\Subjects;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SubjectComponent extends Component
{
    public $count = 0;
    public $subjects;
    public $newSubject;
    public $exam_board;
    public $subject;
    public $level;
    public $grade;
    public $userid;
    public $other;
    public $date;

    
    public function mount()
    {
        $this->count = Subjects::where('userid', Auth::id())->count();
        if ($this->count == 0){
            $this->subjects = Subjects::where('userid', Auth::id())->get();
        } elseif($this->count >= 5)
        {
            return redirect()->route('diploma.index')->with('message', 'You have reached the minimum limit of subjects.');
        }
           
    }
    public function render()
    {
        return view('livewire.subject-component');
       
           
    }

    public function addSubject()
    {
        
        // Create a new subject
        Subjects::create([
            'userid' => Auth::id(),
            'subject' => $this->newSubject,
            'exam_board' => $this->exam_board,
            'date' => $this->date,
            'level' => $this->level,
            'grade' => $this->grade,
        ]);

        $this->count = Subjects::where('userid', Auth::id())->count();
        if($this->count >= 5)
        {
            return redirect()->route('diploma.index')->with('message', 'You have reached the minimum limit of subjects.');
        }

        $this->reset(['newSubject', 'date', 'grade', 'level', 'userid', 'other', 'exam_board', 'subject']);

        $this->newSubject = '';
        $this->date = null;
        $this->grade = null;
        $this->level = null;
        $this->userid = null;
        $this->other = null;
        $this->exam_board = null;
        $this->subject = null;

                        

    }

}
