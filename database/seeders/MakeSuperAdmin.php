<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class MakeSuperAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'sharmapuneet@krenovate.com');

        if ($user) {
            $user->first()->syncRoles('super-admin');
        }
    }
}
