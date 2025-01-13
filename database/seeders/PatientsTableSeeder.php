<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Patient::create(['name' => 'Veronica', 'age' => 40, 'contact' => '0987654321']);
        Patient::create(['name' => 'Xavier', 'age' => 41, 'contact' => '098776543']);
    }
}
