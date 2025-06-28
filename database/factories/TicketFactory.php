<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(['Standard', 'VIP']),
            'price' => $this->faker->numberBetween(10, 200),
            'quantity' => $this->faker->numberBetween(10, 300),
        ];
    }
}
// This factory generates random data for the Ticket model, including type, price, and quantity.
// It can be used to create tickets for events in tests or seeders.