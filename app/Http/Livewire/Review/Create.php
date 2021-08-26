<?php

namespace App\Http\Livewire\Review;

use App\Models\Job;
use App\Models\ReviewList;
use Livewire\Component;

class Create extends Component
{
    /**
     * @var Job
     */
    public $job;
    public $show_create_form = false;

    protected $listeners = ['rerenderComponent' => 'rerenderComponent'];

    public function mount(Job $job) {
       $this->job = $job;
    }

    public function render()
    {
        return view('livewire.review.create');
    }

    public function show_create_form()
    {
        $this->show_create_form = ! $this->show_create_form;

    }
    public function rerenderComponent()
    {
        $this->job = Job::find($this->job->id);
    }
}
