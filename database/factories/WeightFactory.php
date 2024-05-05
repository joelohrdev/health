<?php

namespace Database\Factories;

use App\Models\Weight;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class WeightFactory extends Factory
{
    protected $model = Weight::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'weight' => $this->faker->randomNumber(),
            'date' => $this->faker->randomFloat(),
        ];
    }
}
