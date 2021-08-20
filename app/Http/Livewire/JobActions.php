<?php

namespace App\Http\Livewire;

use Livewire\Component;

class JobActions extends Component
{
    public $key;
    public $creation_date;
    public $qualified;
    public $created_at;
    public $url;
    public $type;

    public function mount($job)
    {
        $this->key = $job->key;
        $this->creation_date = $job->upwork_created_date;
        $this->qualified = $job->qualified;
        $this->created_at = $job->created_at;
        $this->url = $job->job_url;
        $this->type = $job->job_type;
    }

    public function render()
    {
        return view('livewire.job-actions');
    }
}
