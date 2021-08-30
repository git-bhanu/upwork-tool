<?php

namespace App\Console\Commands;

use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ArchiveJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'archive:jobs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will delete the jobs based on the rules decided by the team here : https://www.figma.com/file/GkDWIdHDTmhBwntrfofCnz/Speedy-Sales-STATUS-FLOW?node-id=0%3A1';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Passed.
        $this->expireJobType(config('job_status.status.0'), 7);

        // Failed.
        $this->expireJobType(config('job_status.status.1'), 7);

        // Review Failed.
        $this->expireJobType(config('job_status.status.4'), 7);

        // Manual Pass.
        $this->expireJobType(config('job_status.status.5'), 7);
    }

    public function expireJobType(string $type, int $day)
    {
        $jobs = Job::where('status', $type)
            ->whereDate('upwork_created_date', '<=' ,Carbon::now()->subDays($day))
            ->get();

        foreach ($jobs as $job) {
            $job->archive();
        }

        $this->info($jobs->count() . ' ' . $type . ' Jobs Archived.');
    }
}
