<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Profesor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(EstudianteSeeder::class); 
        $this->call(CalificacionSeeder::class);
        $this->call(CursoSeeder::class);
        $this->call(Profesorseeder::class);
    }
}
