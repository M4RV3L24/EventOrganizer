<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'date', 'start_time', 'booking_url', 'venue', 'active', 'event_category_id', 'organizer_id', 'tags'];
    public function event_category(): BelongsTo {
        return $this->belongsTo(EventCategory::class);
    }

    public function organizer(): BelongsTo {
        return $this->belongsTo(Organizer::class);    
    }

}
