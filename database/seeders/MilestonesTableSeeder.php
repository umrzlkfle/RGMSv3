<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Milestone;

class MilestonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Milestone::create([
            'name' => 'Project Kickoff',
            'target_completionDate' => '2025-01-10',
            'deliverable' => 'Kickoff Meeting Notes',
            'status' => 'completed',
            'remark'=> 'Testing',
            'dateUpdated' => '2025-01-03',
            'grant_id' => '1',
        ]);

        Milestone::create([
            'name' => 'Requirement Gathering',
            'target_completionDate' => '2025-01-20',
            'deliverable' => 'Requirement Document',
            'status' => 'in_progress',
            'remark'=> 'Testing',
            'dateUpdated' => '2025-01-04',
            'grant_id' => '1',
        ]);

        Milestone::create([
            'name' => 'Design Phase',
            'target_completionDate' => '2025-02-15',
            'deliverable' => 'Design Mockups',
            'status' => 'pending',
            'remark'=> 'Testing',
            'dateUpdated' => '2025-01-03',
            'grant_id' => '1',
        ]);

        Milestone::create([
            'name' => 'Development Phase',
            'target_completionDate' => '2025-03-30',
            'deliverable' => 'Source Code',
            'status' => 'pending',
            'remark'=> 'Testing',
            'dateUpdated' => '2025-01-03',
            'grant_id' => '1',
        ]);
    }
}
