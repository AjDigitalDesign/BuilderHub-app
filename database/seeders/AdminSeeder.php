<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'fname' => 'Admin',
            'lname' => 'Main',
            'username' => 'webadmin',
            'email' => 'webadmin@builderhub.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ])->assignRole('admin');

        $agent = User::create([
            'fname' => 'sales',
            'lname' => 'Agent',
            'username' => 'agentadmin',
            'email' => 'agentadmin@builderhub.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ])->assignRole('agent');

        $user = User::create([
            'fname' => 'John',
            'lname' => 'Doe',
            'username' => 'jdoe',
            'email' => 'jdoe@builderhub.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ])->assignRole('user');
    }
}
