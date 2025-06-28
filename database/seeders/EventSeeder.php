<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        // for ($i = 1; $i <= 10; $i++) {
        //     $event = Event::create([
        //         'title' => "Event $i",
        //         'description' => Str::random(30),
        //         'start_date' => now()->addDays(rand(1, 10)),
        //         'end_date' => now()->addDays(rand(11, 20)),
        //     ]);

        //     $event->tickets()->createMany([
        //         [
        //             'type' => 'Standard',
        //             'price' => rand(10, 50),
        //             'quantity' => rand(50, 200),
        //         ],
        //         [
        //             'type' => 'VIP',
        //             'price' => rand(100, 200),
        //             'quantity' => rand(10, 50),
        //         ]
        //     ]);
        // }


        Event::factory()
            ->count(10)
            ->hasTickets(2) // hər birinə 2 ticket
            ->create();
    }
}
