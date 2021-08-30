<?php

namespace App\Http\Livewire\Jobs;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ArchiveJobs extends Component
{
    public $orderBy = '';
    public $sortBy = '';

    public function render()
    {
        $jobs = Job::query()->onlyArchived()->paginate(20);
        return view('livewire.jobs.archive-jobs', [
            'jobs' => $jobs,
        ]);
    }

    public function unacrhive($job_id)
    {
         if (Auth::user()->hasAnyRole(['super-admin', 'sales-manager'])) {
            $job = Job::query()->onlyArchived()->find($job_id)->get()->first();
             $job->update(['archived_at' => null]);
        }
    }
}
