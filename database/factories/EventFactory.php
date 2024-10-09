<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{

    protected $model = \App\Models\Event::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'title' => $this->faker->sentence(),
            'venue' => $this->faker->address(),
            'date' => $this->faker->date(),
            'start_time' => $this->faker->time(),
            'description' => $this->faker->sentence(100),
            'booking_url' => $this->faker->url(),
            'tags' => json_encode($this->faker->words(4)),
            'organizer_id' => $this->faker->numberBetween(1, 10),
            'event_category_id' => $this->faker->numberBetween(1, 10),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ];
    }
}
