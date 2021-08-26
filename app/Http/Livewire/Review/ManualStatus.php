<?php

namespace App\Http\Livewire\Review;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ManualStatus extends Component
{

    public $job;
    public $status = 'manual-pass';
    public $options =
        [['key'=> 'manual-pass', 'value' => 'Manual Pass']];

    protected $listeners = ['rerenderComponent' => 'rerenderComponent'];

    public function mount(Job $job) {
        $this->job = $job;
    }

    public function render()
    {
        return view('livewire.review.manual-status');
    }

    public function submit_form()
    {
        if (Auth::user()->hasRole(['sales-manager', 'super-admin'])) {
            $Buffer = Job::find($this->job->id);
            $Buffer->status = $this->status;
            $Buffer->save();
            $this->job = Job::find($this->job->id);
            $this->emit('rerenderComponent');
        }
    }

    public function rerenderComponent()
    {
        $this->job = Job::find($this->job->id);
    }
}
