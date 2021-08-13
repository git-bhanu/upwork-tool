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
        $this->issues = false;
        $words = Phrases::all()->pluck('word')->toArray();
        foreach ($words as $word) {
            if ($this->caseSensitive) {
                $found = strpos( $this->description, $word );
            } else {
                $found = strripos( $this->description, $word );
            }
            if($found) {
                $this->issues[] = array(
                    'phrase' => $word,
                );
            }
        }

        if (empty($this->issues)) {
            session()->flash('success', 'No phrase match found in description. ');
        }
    }
}
