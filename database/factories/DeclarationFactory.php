<?php

namespace Database\Factories;

use App\Models\Village;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeclarationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "identity_card" => $this->faker->unique()->numberBetween(100000000, 999999999),
            "name" => $this->faker->name,
            "birthday" => $this->faker->dateTimeBetween('-60 years', '-18 years'),
            "sex" => $this->faker->numberBetween(0, 1),
            "country" => $this->faker->country(),
            "permanent_address" => $this->faker->address(),
            "temporary_address" => $this->faker->address(),
            "religion" => $this->faker->numberBetween(0, 1, 2),
            "education" => $this->faker->randomElement(["Đại học", "Cao đẳng", "Trung cấp", "Khác"]),
            "job" => $this->faker->randomElement(["Nhân viên", "Sinh viên", "Khác"]),
            "village_id" => $this->faker->numberBetween(1, 1000),
        ];
    }
}
