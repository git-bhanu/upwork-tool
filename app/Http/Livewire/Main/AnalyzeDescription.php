<?php

namespace App\Http\Livewire\Main;

use App\Models\Phrases;
use Livewire\Component;
use App\Services\AnalyzeUpworkJob;

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

    public function analyze()
    {
        $this->issues = [];

        $class = new AnalyzeUpworkJob($this->description);

        $this->issues = $class->analyze();

        if (empty($this->issues)) {
            session()->flash('success', 'No phrase match found in description. ');
        }
    }
}
