<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        DB::table('cursos')->insert([
            ['nombre' => 'Economía I', 'profesor_id' => 1],
            ['nombre' => 'Redes Computacionales', 'profesor_id' => 2],
            ['nombre' => 'Contabilidad I', 'profesor_id' => 3],
            ['nombre' => 'Arquitectura de la Computadora', 'profesor_id' => 4],
            ['nombre' => 'Ética', 'profesor_id' => 5],
        ]);
        
    }
}
