<?php

namespace App\Http\Livewire;

use App\Http\Controllers\PhraseController;
use App\Models\Phrases;
use Illuminate\Support\Facades\Auth;
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
            'phrases' => Phrases::latest()->paginate(20)
        ]);
    }

    public function saveWord()
    {
        $validatedData = $this->validate();
        $validatedData['word'] = trim($validatedData['word']);
        (new \App\Models\Phrases)->Create([
            'word' => $validatedData['word'],
            'user' => Auth::user()->id,
        ]);
        $this->word = ' ';
    }

    public function deleteWord($id)
    {
        $phrase = Phrases::where('id', $id);

        if ($phrase->user != null) {
            if (Auth::user()->id === $phrase->user->id) {
                $phrase->delete();
            } else {
                session()->flash('error', 'You are not authorized to delete '. $phrase->name . ' Phrase');
            }
        }

    }
}
