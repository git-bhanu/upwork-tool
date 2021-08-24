<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class CreateUserRolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Reset
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'delete phrases']);
        Permission::create(['name' => 'add phrases']);

        $associate = Role::create(['name' => 'sales-associate']);

        $manager = Role::create(['name' => 'sales-manager']);

        $manager->givePermissionTo(['add phrases', 'delete phrases']);

        $admin = Role::create(['name' => 'super-admin']);

        $admin->givePermissionTo(Permission::all());
    }
}
