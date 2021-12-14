<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reporterID' => $this->faker->numberBetween(1, 10),
            'reportTypeID' => $this->faker->numberBetween(1, 10),
            'addedOn' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'reportContent' => $this->faker->text,
            'focusesOnUser' => $this->faker->numberBetween(1, 10),
            'isOpenned' => 1,

        ];
    }
}
