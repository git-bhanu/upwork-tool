<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Phrases extends Model
{
    use HasFactory;

    protected $fillable = ['word'];

    public function create($phrase)
    {
        Auth::user()->phrases()->create($phrase);
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->diffForHumans('now');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
