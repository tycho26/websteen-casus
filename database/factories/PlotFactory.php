<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plot>
 */
class PlotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'plotTitle'=>fake()->name(),
            'plotMunicipality'=>fake()->city(),
            'plotSection'=>'C',
            'plotNum'=>rand(2000,2999)
        ];
    }
}
