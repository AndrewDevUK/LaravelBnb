<?php

namespace Database\Factories;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $from = Carbon::instance($this->faker->dateTimeBetween("-1 months", "+1 months"));
        $to = (clone $from)->addDays(random_int(0, 14));

        return [
            "from" => $from,
            "to" => $to
        ];
    }
}
