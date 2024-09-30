<?php

namespace Database\Seeders;

use App\Models\Hour;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Table;
use App\Models\TableNumber;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Table::factory(11)->create([
            'table_id' => TableNumber::factory(),
            'hour_id' => Hour::factory()
        ]);

        User::factory()->create([
            'email' => 'owner@gmail.com',
            'role' => 'Owner',
        ]);

        User::factory(5)->create([
            'role' => 'Owner',
        ]);

        User::factory()->create([
            'email' => 'admin@gmail.com',
            'role' => 'Admin',
        ]);

        User::factory(5)->create([
            'role' => 'Admin',
        ]);

        User::factory()->create([
            'email' => 'customer@gmail.com',
            'role' => 'Customer',
        ]);

        User::factory(5)->create([
            'role' => 'Customer',
        ]);
    }
}