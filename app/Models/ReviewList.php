<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewList extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'type',  'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
