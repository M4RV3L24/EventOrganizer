<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        EventCategory::factory()
            ->count(3)
            ->state( new Sequence(
                ['name' => 'Expo'],
                ['name' => 'Concert'], 
                ['name' => 'Conference']
            ))
            ->create();
    }
}
