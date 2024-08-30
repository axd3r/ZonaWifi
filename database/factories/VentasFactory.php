<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Asignacion;
use App\Models\Ventas;

class VentasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ventas::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'asignacion_id' => Asignacion::factory(),
            'fecha_venta' => $this->faker->date(),
            'cantidad' => $this->faker->word(),
        ];
    }
}
