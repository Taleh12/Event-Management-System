<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    public function definition(): array
    {
        $start = $this->faker->dateTimeBetween('+1 days', '+10 days');
        $end = (clone $start)->modify('+' . rand(1, 3) . ' days');

        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'start_date' => $start,
            'end_date' => $end,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Event $event) {
            $event->tickets()->saveMany(\App\Models\Ticket::factory()->count(2)->make());
        });
    }
}
// This factory can be used to create event instances with random data for testing or seeding the database.
// It generates a title, description, start date, and end date for the event.