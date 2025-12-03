<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name = ['Superadmin', 'Admin', 'Manager', 'User'];
        foreach ($name as $n) {
            Position::create(['name' => $n]);
        }
    }
}
