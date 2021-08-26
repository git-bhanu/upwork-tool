<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Job::factory(20)->create();
        \App\Models\User::factory(5)->create();

        $this->call([
            CreateUserRolesAndPermissions::class,
            CreateUserEditPermissions::class,
            CreateUserPermissionsForComment::class,
        ]);
    }
}
