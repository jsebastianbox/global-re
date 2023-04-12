<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ExcluyeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->randomElement(['Helicópteros','Líneas de TyD', 'No entidades gubernamentales'])
        ];
    }
}
