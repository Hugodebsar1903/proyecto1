<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EstudianteFactory extends Factory
{
    protected $model = \App\Models\Estudiante::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->firstName, // Genera un nombre aleatorio
            'apellido_paterno' => $this->faker->lastName, // Genera un apellido aleatorio
            'apellido_materno' => $this->faker->lastName, // Genera otro apellido aleatorio
        ];
    }
}
