<?php

namespace Database\Factories;

use App\Models\User_Attributes;
use Illuminate\Database\Eloquent\Factories\Factory;

class User_AttributesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User_Attributes::class;

    public function definition()
    {
        return [
            'attributes' => [
                'age' => rand(12, 45),
                'mobile' => $this->faker->phoneNumber,
                'city' => $this->faker->city,
                'country' => $this->faker->country,
                'address' => $this->faker->address,
                'address2' => $this->faker->address,
                'last_visit' => $this->faker->dateTime,
                'credit' => rand(0, 1000000000),
                'gender' => rand(0, 1),
            ]
        ];
    }
}
