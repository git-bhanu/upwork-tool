<?php

namespace App\Http\Livewire\Main;

use App\Models\Phrases;
use Livewire\Component;

class AnalyzeDescription extends Component
{
    public $description;
    public $isDescriptionFilled;
    public $descriptionLength;
    public $issues = false;
    public $caseSensitive;

    public function updated()
    {
        if ($this->description != '') {
            $this->isDescriptionFilled = true;
            $this->descriptionLength = strlen($this->description);
        } else {
            $this->isDescriptionFilled = false;
            $this->descriptionLength = 0;
        }
    }

    public function render()
    {
        return view('livewire.main.analyze-description');
    }

    public function removeFlash()
    {

    }

    public function analyze()
    {
        $this->issues = [];
        $words = Phrases::all()->pluck('word')->toArray();
        foreach ($words as $word) {
            $regex = '/\b'.$word.'\b/';
            $found = preg_match_all($regex, $this->description, $issue, PREG_OFFSET_CAPTURE);

            array_push($this->issues, $issue);
        }

        dd($this->issues);

        if (empty($this->issues)) {
            session()->flash('success', 'No phrase match found in description. ');
        }
    }
}
