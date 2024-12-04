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
            ['nombre' => 'Economía I'],
            ['nombre' => 'Redes Computacionales'],
            ['nombre' => 'Contabilidad I'],
            ['nombre' => 'Arquitectura de la Computadora'],
            ['nombre' => 'Ética'],
        ]);
        
    }
}
