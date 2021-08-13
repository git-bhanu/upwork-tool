<?php

namespace App\Models;

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
}
