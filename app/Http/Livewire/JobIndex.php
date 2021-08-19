<?php

namespace App\Http\Livewire;

use App\Models\Job;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;


class JobIndex extends Component
{
    use WithPagination;


    /**
     * Job ID
     *
     * @var string
     */
    public $ids;

    /**
     * Job ID
     *
     * @var string
     */
    public $type;

    /**
     * Applied By
     *
     * @var int
     */
    public $applied_by;

    public $applied_options;

    public $created_on;

    public $applied_date;

    public $qualification_status;

    public $upwork_created_date;

    public $orderBy = 'id';
    public $sortBy = 'asc';

    protected $queryString = ['applied_by', 'type', 'ids', 'created_on', 'qualification_status', 'applied_date', 'orderBy', 'sortBy'];

    public function mount()
    {
        $applied_options = User::all()->toArray();
        $options = array();

        $options[] = ['key' => '', 'value' => 'All User'];

        foreach ($applied_options as $option) {
            $options[] = ['key' => $option['id'], 'value' => $option['name']];
        }

        $this->applied_options = $options;
    }

    private function getDateArray($date_string)
    {
        if (strpos($date_string, 'to') !== false) {
            return explode("to", $date_string);
        } else {
            return array($date_string);
        }
    }

    public function updating()
    {
        $this->resetPage();
    }

    public function render()
    {

        $queryJobs = Job::when($this->type, function ($query) {
            $query->where('job_type', $this->type);
        })
            ->when($this->ids, function ($query) {
                $query->whereIn('id', explode(",",$this->ids));
            })
            ->when(!($this->qualification_status == ''), function ($query) {
                $query->where('qualified', $this->qualification_status);
            })
            ->when($this->created_on, function ($query) {
                $created_on = $this->getDateArray($this->created_on);
                if (count($created_on) === 2) {
                    $query->whereBetween('created_at', $created_on);
                } else {
                    $query->whereDate('created_at', '=', date($created_on[0]));
                }
            })
            ->when($this->upwork_created_date, function ($query) {
                $upwork_date = $this->getDateArray($this->upwork_created_date);
                if (count($upwork_date) === 2) {
                    $query->whereBetween('upwork_created_date', $upwork_date);
                } else {
                    $query->whereDate('upwork_created_date', '=', date($upwork_date[0]));
                }
            })
            ->orderBy($this->orderBy, $this->sortBy)
            ->paginate(20);

        return view('livewire.job-index', [
            'jobs' => $queryJobs,
            'count' => $queryJobs->total()
        ]);
    }

    public function sortData($value) {
        $this->orderBy = $value;
        if ( $this->sortBy === 'asc' ) {
            $this->sortBy = 'desc';
        } else {
            $this->sortBy = 'asc';
        }
    }
}
