<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $from = Carbon::instance($this->faker->dateTimeBetween("-1 months", "+1 months"));
        $to = (clone $from)->addDays(random_int(0, 14));

        return [
            "from" => $from,
            "to" => $to
        ];
    }
}
