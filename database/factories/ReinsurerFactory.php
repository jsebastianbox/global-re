<?php

namespace Database\Factories;

use App\Models\Reinsurers;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReinsurerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Reinsurers::class;

    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'country_id'=>$this->faker->numberBetween(1,2),
            'city_id'=>$this->faker->numberBetween(1,5),
            'position_id'=>$this->faker->numberBetween(1,5),
            'contact'=>$this->faker->name(),
            'email'=>$this->faker->email(),
            'phone_one'=>$this->faker->phoneNumber(),
            'phone_two'=>$this->faker->phoneNumber(),
            'phone_three'=>$this->faker->phoneNumber(),
            'type_id'=>$this->faker->numberBetween(1,4),
            'business_id'=>$this->faker->numberBetween(1,4)
        ];
    }
}
