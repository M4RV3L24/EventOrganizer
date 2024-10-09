<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
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

        Event::factory()->count(6)->state(new Sequence(
            [
                'title' => 'Indonesian Innovation Challenge 2024 Powered by Launch Pad',
                'description' => fake()->text(),
                'date' => "2024-10-23",
                'start_time' => "09:00:00",
                'tags' => json_encode(['tag1', 'tag2']),
                'booking_url' => 'https://example.com/event1',
                'venue' => 'Jatim Expo',
                'organizer_id' => function () use ($organizerId) {
                    return $organizerId[array_rand($organizerId)];
                },
                'event_category_id' => function () use ($eventCategoryId) {
                    return $eventCategoryId[array_rand($eventCategoryId)];
                }
            ],
            [
                'title' => 'Kids Education Expo 2024',
                'description' =>  fake()->text(),
                'date' => "2024-10-21",
                'start_time' => "09:00:00",
                'tags' => json_encode(['tag3', 'tag2']),
                'booking_url' => 'https://example.com/event2',
                'venue' => 'The Westin',
                'organizer_id' => function () use ($organizerId) {
                    return $organizerId[array_rand($organizerId)];
                },
                'event_category_id' => function () use ($eventCategoryId) {
                    return $eventCategoryId[array_rand($eventCategoryId)];
                }

            ],
            [
                'title' => 'Surabaya Great Expo 2024',
                'description' => fake()->text(),
                'date' => "2024-10-16",
                'start_time' => "08:00:00",
                'tags' => json_encode(['tag1', 'tag2', 'tag4']),
                'booking_url' => 'https://example.com/event3',
                'venue' => 'Grand City Surabaya',
                'organizer_id' => function () use ($organizerId) {
                    return $organizerId[array_rand($organizerId)];
                },
                'event_category_id' => function () use ($eventCategoryId) {
                    return $eventCategoryId[array_rand($eventCategoryId)];
                }

            ],
            [
                'title' => 'Japan Edu Expo 2024',
                'description' => fake()->text(),
                'date' => "2024-09-22",
                'start_time' => "08:00:00",
                'tags' => json_encode(['tag1', 'tag2', 'tag3', 'tag4']),
                'booking_url' => 'https://example.com/event4',
                'venue' => 'Hotel Said',
                'organizer_id' => function () use ($organizerId) {
                    return $organizerId[array_rand($organizerId)];
                },
                'event_category_id' => function () use ($eventCategoryId) {
                    return $eventCategoryId[array_rand($eventCategoryId)];
                }

            ],
            [
                'title' => 'SMEX (Surabaya Music, Multimedia, and Lightning Expo) 2024',
                'description' => fake()->text(),
                'date' => "2024-09-29",
                'start_time' => "08:00:00",
                'tags' => json_encode(['tag1', 'tag2', 'tag3', 'tag4']),
                'booking_url' => 'https://example.com/event5',
                'venue' => 'Grand City Surabaya',
                'organizer_id' => function () use ($organizerId) {
                    return $organizerId[array_rand($organizerId)];
                },
                'event_category_id' => function () use ($eventCategoryId) {
                    return $eventCategoryId[array_rand($eventCategoryId)];
                }

            ],
            [
                'title' => 'Surabaya Hospital Expo 2024',
                'description' => 'Description for event 1',
                'date' => "2024-10-11",
                'start_time' => "08:00:00",
                'tags' => json_encode(['tag1', 'tag2', 'tag5', 'tag4']),
                'booking_url' => 'https://example.com/event6',
                'venue' => 'Grand City Surabaya',
                'organizer_id' => function () use ($organizerId) {
                    return $organizerId[array_rand($organizerId)];
                },
                'event_category_id' => function () use ($eventCategoryId) {
                    return $eventCategoryId[array_rand($eventCategoryId)];
                }

            ]
        ))
        ->create();
    }
}
