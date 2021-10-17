<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role_id' => Role::first()->id,
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone_no' => 3434342,
            'address' => 'jkhjhjjh',
            'profile_pic' => '4.jpeg',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'role_id' => Role::skip(1)->first()->id,
            'username' => 'User',
            'email' => 'user@gmail.com',
            'phone_no' => 3434342,
            'address' => 'jkhjhjjh',
            'profile_pic' => '4.jpeg',
            'password' => Hash::make('12345678'),
        ]);


    }
}
