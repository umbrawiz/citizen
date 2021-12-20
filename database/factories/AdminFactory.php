<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $array = ['A1', 'A2', 'A3', 'B1', 'B2'];
        $k = array_rand($array);
        return [
            'username' => $this->faker->name(),
            'email_verified_at' => now(),
            'password' => bcrypt(123456),
            'remember_token' => Str::random(10),
            'type' => $array[$k]
        ];
    }
}
