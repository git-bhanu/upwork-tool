<?php

namespace App\Events;

use App\Http\Controllers\JobController;
use App\Models\Job;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class JobCreated
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $job;

    public function __construct(Job $job)
    {
        $this->job = $job;
        $description = $job->description;
        JobController::updateAnalysis($description, $job->id);
    }
}
