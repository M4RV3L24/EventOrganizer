<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('venue');
            $table->date('date');
            $table->time('start_time');
            $table->longText('description');
            $table->string('booking_url')->nullable();
            $table->json('tags');
            $table->foreignId('organizer_id')->references('id')->on('organizers')->cascadeOnDelete();
            $table->foreignId('event_category_id')->references('id')->on('event_categories')->cascadeOnDelete();
            $table->integer('active')->default(1); // 1 = active, 0 = inactive
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
