<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\AsignamientoCodigos;
use App\Models\Codigo;
use App\Models\Usuario;

class AsignamientoCodigosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AsignamientoCodigos::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'fecha_asignamiento' => $this->faker->date(),
            'usuario_id' => Usuario::factory(),
            'codigo_id' => Codigo::factory(),
        ];
    }
}
