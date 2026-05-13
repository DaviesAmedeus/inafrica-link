<?php

namespace Database\Seeders;

use App\Models\User;
use App\UserStatus;
use App\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::create([
        //     'name'=> 'Admin',
        //     'email'=>'admin@email.com',
        //     'username'=>'admin',
        //     'password'=>Hash::make('123456'),
        //     'type'=>UserType::SuperAdmin,
        //     'status'=>UserStatus::Active
        // ]);

        User::create([
            'name'=> 'Nasra',
            'email'=>'nasra@email.com',
            'username'=>'nasra',
            'password'=>Hash::make('123456'),
            'type'=>UserType::Admin,
            'status'=>UserStatus::Active
        ]);
    }
}
