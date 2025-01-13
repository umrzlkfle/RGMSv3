<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grant;

class GrantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Grant::create([
            'projectTitle' => 'AI Research Grant',
            'grantProvider' => 'Tech Innovation Fund',
            'grantAmount' => 75000.00,
            'startDate' => '2024-01-01',
            'durationMonth' => 24,
        ]);

        Grant::create([
            'projectTitle' => 'Renewable Energy Study',
            'grantProvider' => 'Green Earth Organization',
            'grantAmount' => 50000.00,
            'startDate' => '2024-06-01',
            'durationMonth' => 12,
        ]);
    }
}
