<?php

namespace Database\Factories;

use App\Models\Village;
use App\Models\Ward;
use Illuminate\Database\Eloquent\Factories\Factory;

class VillageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id = $this->faker->numberBetween(1, 10614);
        $ward =  Ward::where('id', $id)->first();
        return [
            "name" => $this->faker->name,
            "code" => $ward->code . $this->faker->numberBetween(10, 99),
            "ward_id" => $id
        ];
    }
}
