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

    public $filtered = [];

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

        $this->updatingIds($this->ids);
        $this->updatingType($this->type);
        $this->updatingAppliedDate($this->applied_date);
        $this->updatingAppliedDate($this->applied_date);
        $this->updatingAppliedBy($this->applied_by);
        $this->updatingUpworkCreatedDate($this->upwork_created_date);
        $this->updatingCreatedOn($this->created_on);
        $this->updatingQualificationStatus($this->qualification_status);
    }

    public function updatingIds($value) {
        if ($value != '') {
            $this->filtered['ids'] = array('label' => "ID", 'value' =>  $value);
        } else {
            unset($this->filtered['ids']);
        }
    }

    public function updatingType($value) {
        if ($value != '') {
            $this->filtered['type'] = array('label' => "Job Type", 'value' => $value);
        } else {
            unset($this->filtered['type']);
        }
    }

    public function updatingAppliedDate($value) {
        if ($value != '') {
            $this->filtered['applied_date'] = array('label' => "Applied Date", 'value' => $value);
        } else {
            unset($this->filtered['applied_date']);
        }
    }

    public function updatingAppliedBy($value) {
        if($value != '') {
            $this->filtered['applied_by'] = array('label' => "Applied By", 'value' =>  $this->findValueByKey($this->applied_options, $value));
        } else {
            unset($this->filtered['applied_by']);
        }
    }

   public function updatingUpworkCreatedDate($value) {
       if($value != '') {
           $this->filtered['upwork_created_date'] = array('label' => "Job Created Date", 'value' => $value);
       } else {
           unset($this->filtered['upwork_created_date']);
       }
    }

    public function updatingCreatedOn($value) {
        if($value != '') {
            $this->filtered['created_on'] = array('label' => "Qualified Date", 'value' => $value);
        } else {
            unset($this->filtered['created_on']);
        }
    }

    public function updatingQualificationStatus($value) {
        if($value != '') {
            $this->filtered['qualification_status'] = array('label' => "Job Status", 'value' => $value);
        } else {
            unset($this->filtered['qualification_status']);
        }
    }

    private function findValueByKey($array, $value) {
        foreach ($array as $key => $item) {
            if ($item['key'] == $value) {
                return $item['value'];
            }
        }
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
                $query->where('status', $this->qualification_status);
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

    public function removeFilter($action) {
        // dd($this->filtered[$action]);
        $this->$action = '';
        unset( $this->filtered[$action]);
    }
}
