<?php

namespace App\Http\Livewire;

use App\Models\Phrases;
use Livewire\Component;
use Livewire\WithPagination;

class Phrase extends Component
{
    use WithPagination;

    public $word;
    public $wordCount;

    protected $rules = [
        'word' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        $this->wordCount = Phrases::all()->count();

        return view('livewire.phrase', [
            'phrases' => Phrases::latest()->paginate(10)
        ]);
    }

    public function saveWord()
    {
        $validatedData = $this->validate();
        $validatedData['word'] = trim($validatedData['word']);
        Phrases::firstOrCreate($validatedData);
        $this->word = '';
    }

    public function deleteWord($id)
    {
        $delete = Phrases::where('id', $id)->delete();
    }
}
