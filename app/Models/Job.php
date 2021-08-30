<?php

namespace App\Models;

use App\Events\JobCreated;
use BeyondCode\Comments\Traits\HasComments;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LaravelArchivable\Archivable;

class Job extends Model
{
    use HasFactory;
    use HasComments;
    use Archivable;

    protected $fillable = ['archived_at'];

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

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function link()
    {
        return route('job.single', ['job' => $this->id]);
    }

}
