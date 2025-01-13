<?php

namespace Database\Seeders;

use App\Models\AcademicianGrant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademicianGrantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AcademicianGrant::create([
            'academician_id' => '1',
            'grant_id' => '1',
            'role' => 'Member',
        ]);

        AcademicianGrant::create([
            'academician_id' => '3',
            'grant_id' => '2',
            'role' => 'Leader',
        ]);

        AcademicianGrant::create([
            'academician_id' => '1',
            'grant_id' => '2',
            'role' => 'Member',
        ]);

        AcademicianGrant::create([
            'academician_id' => '2',
            'grant_id' => '2',
            'role' => 'Member',
        ]);
    }
}
