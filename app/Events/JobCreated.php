<?php

namespace App\Services;

use App\Http\Controllers\JobController;

class JobCreated
{

    public function __construct($job)
    {
        dd($job);
        $description = $job->description;
        JobController::updateAnalysis($description, $job->id);
    }
}
