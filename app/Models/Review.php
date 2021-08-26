<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'job_id', 'created_by', 'reviewed_by', 'close_reason_id', 'open_reason_id', 'comment'];
    /**
     * The users that has got reviews.
     */
    public function reviewers()
    {
        return $this->belongsToMany(User::class, 'review_user')->withTimestamps();
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function open_reason()
    {
        return $this->belongsTo(ReviewList::class, 'open_reason_id');
    }

    public function close_reason()
    {
        return $this->belongsTo(ReviewList::class, 'close_reason_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function reviewed_by()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    public function getCreatedAtAttribute($date)
    {
        $date = date('d.m.Y H:i:s', strtotime($date));
        return Carbon::createFromTimestamp(strtotime($date))->diffForHumans('now');
    }

    public function reviewed_in()
    {
        return $this->updated_at->diffForHumans('now');
    }
}
