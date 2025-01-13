<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Academician;

class AcademiciansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Academician::create([
            'name' => 'Dr. John Doe',
            'staffNo' => '12345',
            'email' => 'john.doe@example.com',
            'college' => 'College of Engineering',
            'department' => 'Computer Science',
            'position' => 'Professor',
        ]);

        Academician::create([
            'name' => 'Dr. Jane Smith',
            'staffNo' => '67890',
            'email' => 'jane.smith@example.com',
            'college' => 'College of Science',
            'department' => 'Physics',
            'position' => 'Senior Lecturer',
        ]);

        Academician::create([
            'name' => 'Izzat Hatta',
            'staffNo' => 'ACD1',
            'email' => 'izzathatta@gmail.com',
            'college' => 'College of Science',
            'department' => 'Physics',
            'position' => 'Senior Lecturer',
        ]);

        Academician::create([
            'name' => 'Irfan Fahmi',
            'staffNo' => 'ACD2',
            'email' => 'irfanfahmi@gmail.com',
            'college' => 'College of Dota',
            'department' => 'Invoker',
            'position' => 'Lecturer',
        ]);

        Academician::create([
            'name' => 'Lina Inverse',
            'staffNo' => 'ACD3',
            'email' => 'linainverse@gmail.com',
            'college' => 'College of Pyromancy',
            'department' => 'Fire Magic',
            'position' => 'Senior Lecturer',
        ]);
        
        Academician::create([
            'name' => 'Crystal Maiden',
            'staffNo' => 'ACD4',
            'email' => 'crystalmaiden@gmail.com',
            'college' => 'College of Ice',
            'department' => 'Frost Studies',
            'position' => 'Researcher',
        ]);
        
        Academician::create([
            'name' => 'Juggernaut Blade',
            'staffNo' => 'ACD5',
            'email' => 'juggernautblade@gmail.com',
            'college' => 'College of Blades',
            'department' => 'Blade Mastery',
            'position' => 'Lecturer',
        ]);
        
        Academician::create([
            'name' => 'Shadow Fiend',
            'staffNo' => 'ACD6',
            'email' => 'shadowfiend@gmail.com',
            'college' => 'College of Shadows',
            'department' => 'Dark Arts',
            'position' => 'Senior Researcher',
        ]);
        
        Academician::create([
            'name' => 'Earthshaker Totem',
            'staffNo' => 'ACD7',
            'email' => 'earthshaker@gmail.com',
            'college' => 'College of Earth',
            'department' => 'Seismology',
            'position' => 'Lecturer',
        ]);
        
        Academician::create([
            'name' => 'Zeus Thundergod',
            'staffNo' => 'ACD8',
            'email' => 'zeusthundergod@gmail.com',
            'college' => 'College of Thunder',
            'department' => 'Electrical Studies',
            'position' => 'Professor',
        ]);
    }
}
