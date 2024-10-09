<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $organizerId = \App\Models\Organizer::pluck('id')->toArray();
        $eventCategoryId = \App\Models\EventCategory::pluck('id')->toArray();
        Event::factory()->count(10)
        ->create([
            'organizer_id' => function () use ($organizerId) {
                return $organizerId[array_rand($organizerId)];
            },
            'event_category_id' => function () use ($eventCategoryId) {
                return $eventCategoryId[array_rand($eventCategoryId)];
            }
        ]);
    }
}
