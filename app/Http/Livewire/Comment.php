<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Livewire\Component;

class Comment extends Component
{
    public $job_id;
    public $comments;
    public $commentBody;
    public $job;

    public function mount($job_id)
    {
        $this->job_id = $job_id;
    }

    public function render()
    {
        $this->job = Job::find($this->job_id);
        $this->comments = $this->job->comments->sortByDesc('created_at');

        return view('livewire.comment');
    }

    public function postComment()
    {
        if ($this->commentBody != '') {
            $this->job->commentAsUser(auth()->user(), $this->commentBody);
            $this->commentBody = '';
        }
    }

}
