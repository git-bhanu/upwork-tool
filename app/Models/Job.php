<?php

namespace App\Models;

use App\Events\JobCreated;
use BeyondCode\Comments\Traits\HasComments;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    use HasComments;

    protected $casts = [
        'analysis' => 'array'
    ];

    protected $dispatchesEvents = [
        'created' => JobCreated::class,
    ];


    public function getUpworkCreatedDateAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->toFormattedDateString();
    }

    public function getQualifiedDateAttribute($date)
    {
        if($date) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $date)->toFormattedDateString();
        }
    }

}
