<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Review;
use App\Models\ReviewList;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RemoveTestData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        Review::query()->delete();
        ReviewList::query()->delete();
        Job::query()->delete();
        DB::statement("SET foreign_key_checks=1");

    }
}
