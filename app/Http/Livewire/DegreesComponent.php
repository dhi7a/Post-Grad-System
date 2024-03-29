<?php

namespace App\Http\Livewire;

use App\Models\UniversityStudies;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Carbon\Carbon;

class DegreesComponent extends Component
{
    public $count = 0;
    public $degrees;
    public $newDegree;
    public $userid;
    public $programme;
    public $class;
    public $institution;
    public $date;
    public $level;
    public $label = "Honours Degree";


    public function mount()
    {
       $this->count = UniversityStudies::where('userid', Auth::id())->count();
        if ($this->count == 0)
        {
            $this->degrees = UniversityStudies::where('userid', Auth::id())->get();
        }elseif($this->count == 0)
        {
            $this->label = 'Honours Degree';
        }
        elseif($this->count == 1)
        {
            $this->label = 'Masters Degree';
        }
        elseif($this->count == 2)
        {
            $this->label = 'PHD (if applicable)';

        }elseif($this->count >= 3){
            return redirect()->route('research-experience.index')->with('message', 'You have reached the minimum limit of degrees.');
        }
    }


    public function render()
    {
        $showSkipButton = $this->count >= 3;
        return view('livewire.degrees-component', compact('showSkipButton'));
    }

    public function addDegree()
    {

        // Create a new Degree
        UniversityStudies::create([
            'userid' => Auth::id(),
            'degrees' => $this->newDegree,
            'programme' => $this->programme,
            'class' => $this->class,
            // 'date' => $this->date,
            'date' => Carbon::createFromDate($this->date, 1, 1)->toDateString(), // Convert to 'YYYY-01-01' format
            'institution' => $this->institution,

        ]);

        $this->count = UniversityStudies::where('userid', Auth::id())->count();

        if ($this->count == 0)
        {
            $this->degrees = UniversityStudies::where('userid', Auth::id())->get();
        }elseif($this->count == 0)
        {
            $this->label = 'Honours Degree';
        }
        elseif($this->count == 1)
        {
            $this->label = 'Masters Degree';
        }
        elseif($this->count == 2)
        {
            $this->label = 'PHD';

        }elseif($this->count >= 3){
            return redirect()->route('research-experience.index')->with('message', 'You have reached the minimum limit of degrees.');
        }

        if($this->count >= 3)
        {
            return redirect()->route('research-experience.index')->with('message', 'You have reached the minimum limit of Degrees required.');
        }

        $this->reset(['newDegree', 'date', 'class', 'programme', 'userid', 'institution']);

        $this->newDegree = '';
        $this->degrees = null;
        $this->date = null;
        $this->class = null;
        $this->userid = null;
        $this->programme = null;
        $this->institution = null;

    }

}
