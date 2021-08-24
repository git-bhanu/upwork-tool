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
    public $qualified;
    public $created_at;
    public $url;
    public $type;
    /**
     * @var mixed
     */
    private $job;
    public $analysis;
    public $qualified_date;

    public function mount($job_id)
    {
        $this->job_id = $job_id;
    }

    public function render()
    {
        $job = Job::where('id', $this->job_id)->get()[0];
        $this->job = $job;
        $this->key = $job->key;
        $this->creation_date = $job->upwork_created_date;
        $this->qualified = $job->qualified;
        $this->created_at = $job->created_at;
        $this->url = $job->job_url;
        $this->type = $job->job_type;
        $this->analysis = $job->analysis;
        $this->qualified_date = $job->qualified_date;
        return view('livewire.job-actions');
    }

    public function reAnalyze()
    {
        $this->job = Job::where('id', $this->job_id)->get()[0];
        $class = new AnalyzeUpworkJob($this->job->description);
        JobController::updateAnalysis($class->analyze(), $this->job_id);
    }
}
