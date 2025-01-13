<?php

namespace Database\Seeders;

use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Ali Imran',
            'email' => 'aliimran@gmail.com',
            'userCategory' => 'admin',
            'password' => '123456789',
        ]);

        User::create([
            'name' => 'Andi Aqil',
            'email' => 'andiaqil@gmail.com',
            'userCategory' => 'staff',
            'password' => '123456789',
        ]);

        User::create([
            'name' => 'Izzat Hatta',
            'email' => 'izzathatta@gmail.com',
            'userCategory' => 'academician',
            'password' => '123456789',
        ]);
    }
}
