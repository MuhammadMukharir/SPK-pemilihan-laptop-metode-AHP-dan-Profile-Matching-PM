<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = 
        [
            [
                'name' => 'user1',
                'email' => 'user1@user1.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'user2',
                'email' => 'user2@user2.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'user3',
                'email' => 'user3@user3.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'user4',
                'email' => 'user4@user4.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'user5',
                'email' => 'user5@user5.com',
                'password' => Hash::make('12345678'),
            ]
        ];

        foreach ($users as $user) {
            $this_user = User::create(
                [
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'password' => $user['password'],
                ]
            );
            
            $this_user->assignRole(['User']);
        }


    }
}
