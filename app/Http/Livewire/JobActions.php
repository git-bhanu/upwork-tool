<?php

namespace App\Http\Livewire;

use App\Http\Controllers\JobController;
use App\Models\Job;
use App\Services\AnalyzeUpworkJob;
use Livewire\Component;

class JobActions extends Component
{
    public $job_id;
    public $key;
    public $creation_date;
    public $status;
    public $created_at;
    public $url;
    public $type;
    /**
     * @var mixed
     */
    public $job;
    public $analysis;
    public $qualified_date;

    protected $listeners = ['rerenderComponent' => 'rerenderComponent'];

    public function mount($job_id)
    {
        $this->job_id = $job_id;
        $this->job = Job::find($job_id);
    }

    public function render()
    {
        $this->key = $this->job->key;
        $this->creation_date = $this->job->upwork_created_date;
        $this->status = $this->job->status;
        $this->created_at = $this->job->created_at;
        $this->url = $this->job->job_url;
        $this->type = $this->job->job_type;
        $this->analysis = $this->job->analysis;
        $this->qualified_date = $this->job->qualified_date;
        return view('livewire.job-actions');
    }

    public function reAnalyze()
    {
        $this->job = Job::where('id', $this->job_id)->get()[0];
        $class = new AnalyzeUpworkJob($this->job->description);
        JobController::updateAnalysis($class->analyze(), $this->job_id);
        $this->emit('rerenderComponent');
    }

    public function rerenderComponent()
    {
        $this->job = Job::find($this->job_id);
    }
}
