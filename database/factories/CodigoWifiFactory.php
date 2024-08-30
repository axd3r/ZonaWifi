<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\CodigoWifi;

class CodigoWifiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CodigoWifi::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'codigo' => $this->faker->word(),
            'estado' => $this->faker->word(),
            'fecha_creacion' => $this->faker->date(),
            'valor' => $this->faker->randomFloat(0, 0, 9999999999.),
        ];
    }
}
