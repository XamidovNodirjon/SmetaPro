<?php

namespace Database\Seeders;

use App\Models\Position;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    private const USERS = [
        'Superadmin' => [
            'name'  => 'Super Admin',
            'email' => 'superadmin@gmail.com',
        ],
        'Admin' => [
            'name'  => 'Admin User',
            'email' => 'admin@gmail.com',
        ],
        'Manager' => [
            'name'  => 'Manager User',
            'email' => 'manager@gmail.com',
        ],
        'User' => [
            'name'  => 'Regular User',
            'email' => 'user@gmail.com',
        ],
    ];

    private const DEFAULT_PASSWORD = 'password';

    public function run(): void
    {
        $password = Hash::make(self::DEFAULT_PASSWORD);

        foreach (self::USERS as $positionName => $data) {
            $position = Position::where('name', $positionName)->firstOrFail();

            User::updateOrCreate(
                ['email' => $data['email']],
                [
                    'name'              => $data['name'],
                    'email_verified_at' => now(),
                    'password'          => $password,
                    'position_id'       => $position->id,
                ]
            );
        }
    }
}