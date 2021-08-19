<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->toFormattedDateString();
    }
    public function getUpworkCreatedDateAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->toFormattedDateString();
    }

}
