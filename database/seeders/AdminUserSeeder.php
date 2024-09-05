<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
Use App\Models\User;


class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'user']);
        User::create([
            'name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admineduteku@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $user = User::find(1);
        $user->assignRole($role1);
    }
}
