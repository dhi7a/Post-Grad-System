<?php

namespace App\Http\Livewire;

use App\Models\Referees;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RefereesComponent extends Component
{
    public $count = 0;
    public $referees;
    public $newReferee;
    public $userid;
    public $full_name;
    public $address;
    public $phone;
    public $email;
    public $occupation;
    // public $label = "";

    public function mount()
    {
        $this->count = Referees::where('userid', Auth::id())->count();
        if ($this->count == 0){
            $this->referees = Referees::where('userid', Auth::id())->get();
        } elseif($this->count >= 2)
        {
            return redirect()->route('documents.index')->with('message', 'You have reached the minimum limit of referees.');
        }
           
    }

    public function render()
    {
        return view('livewire.referees-component');
    }

    public function addReferee()
{
    Referees::create([
        'userid' => Auth::id(),
        'referees' => $this->newReferee,
        'full_name' => $this->full_name,
        'address' => $this->address,
        'phone' => $this->phone,
        'email' => $this->email,
        'occupation' => $this->occupation,
    ]);

    $this->count = Referees::where('userid', Auth::id())->count(); // Use count() instead of get()

    if ($this->count >= 2) {
        return redirect()->route('documents.index')->with('message', 'You have reached the minimum limit of referees required.');
    

        $this->reset(['newReferee', 'full_name', 'address', 'phone', 'email', 'occupation']);

        $this->newReferee = '';
        $this->referees = null;
        $this->userid = null;
        $this->full_name = null;
        $this->address = null;
        $this->phone = null;
        $this->email = null;
        $this->occupation = null; 
        
    }
    
}
}