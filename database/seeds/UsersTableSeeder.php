<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $admin = Role::create(['name' => 'admin']);

        $user = \App\Models\User::create([
            'name'              => 'Administrator',
            'email'             => 'admin@gmail.com',
            'password'          => bcrypt('admin'),
            'email_verified_at' => now(),
            'created_at'        => now(),
            'updated_at'        => now()

        ]);

        $user->assignRole($admin);
    }
}
