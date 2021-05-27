<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $userList = [
            [
                'name'              => 'Admin',
                'email'             => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password'          => bcrypt('password'), 
                'remember_token'    => Str::random(10),
                'role_id'           => 1,
                'phone'             => '+12345678910',
                'address'           => null,
            ],
            [
                'name'              => 'Demo Lawyer 1',
                'email'             => 'demo.lawyer1@gmail.com',
                'email_verified_at' => now(),
                'password'          => bcrypt('password'), 
                'remember_token'    => Str::random(10),
                'role_id'           => 2,
                'phone'             => '+12345678910',
                'address'           => null,
            ],
            [
                'name'              => 'Demo Lawyer 2',
                'email'             => 'demo.lawyer2@gmail.com',
                'email_verified_at' => now(),
                'password'          => bcrypt('password'), 
                'remember_token'    => Str::random(10),
                'role_id'           => 2,
                'phone'             => '+12345678910',
                'address'           => null,
            ],
            [
                'name'              => 'Demo Client 1',
                'email'             => 'demo.client1@gmail.com',
                'email_verified_at' => now(),
                'password'          => bcrypt('password'), 
                'remember_token'    => Str::random(10),
                'role_id'           => 3,
                'phone'             => '+12345678910',
                'address'           => null,
            ],
            [
                'name'              => 'Demo Client 2',
                'email'             => 'demo.client2@gmail.com',
                'email_verified_at' => now(),
                'password'          => bcrypt('password'), 
                'remember_token'    => Str::random(10),
                'role_id'           => 3,
                'phone'             => '+12345678910',
                'address'           => null,
            ],
        ];

        User::insert($userList);
    }
}
