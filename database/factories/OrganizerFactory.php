<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Organizer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\organizer>
 */
class OrganizerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Organizer::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => $this->faker->name(),
            'description' => $this->faker->paragraph(),
            'facebook_link' => 'https://m.facebook.com/' . $this->faker->userName,
            'x_link' => 'https://x.com/'.$this->faker->userName,
            'website_link' => $this->faker->url(),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ];
    }
}
