<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Event;
use App\Models\Organizer;
use Illuminate\Http\Request;
use App\Models\EventCategory;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    //

    function index() {
        // $events = Event::all();
        $events = Event::orderByDesc('date')->where('active', 1)->get()->map(function ($event) {
            $event->formatted_date = Carbon::parse($event->date)->format('D, M j Y'); // e.g., January 1, 2023
            $event->formatted_time = Carbon::parse($event->start_time)->format('h:i A'); // e.g., 1:00 PM
            return $event;
        });

        return view('event.index', [
            'events' => $events
        ]);
    }

    function detail($id): View {
        $event = Event::with('organizer', 'event_category')->findOrFail($id);
        $event->formatted_date = Carbon::parse($event->date)->format('D, M j Y'); // e.g., Wed, Oct 16 2023
        $event->formatted_time = Carbon::parse($event->start_time)->format('h:i A'); // e.g., 01:00 PM
        $event->formatted_tags = json_decode($event->tags);
        return view('event.detail', compact('event'));
    }

    function admin() {
        $events = $events = Event::orderBy('date')->where('active', 1)->get()->map(function ($event) {
            $event->formatted_date = Carbon::parse($event->date)->format('D, M j Y'); // e.g., January 1, 2023
            $event->formatted_time = Carbon::parse($event->start_time)->format('h:i A'); // e.g., 1:00 PM
            return $event;
        });

        return view('event.admin', [
            'events' => $events
        ]);
    }

    function edit(Request $request) {
        $event = Event::where('id', $request->event_id)->first();
        $organizers = Organizer::where('active', 1)->get();
        $categories = EventCategory::where('active', 1)->get();
        return view('event.insert', [
            'event' => $event,
            'organizers' => $organizers,
            'categories' => $categories
        ]);

    }

    function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i:s',
            'organizer_id' => 'required',
            'event_category_id' => 'required',
            'tags' => 'required',
            'booking_url' => 'required|url',
            'venue' => 'required',

        ]);

        $validated['tags'] = json_encode(explode(',', $validated['tags']));

        try {
            Event::create($validated);
            return redirect()->route('event.admin')->with('success', 'Event created successfully');
        }

        catch (Exception $e) {
            return redirect()->route('event.admin')->with('error', $e->getMessage());
        }
    }

    function delete(Request $request) {
        $validated = $request->validate([
            'event_id' => 'required',
        ]);
        try {
            
            $organizer = Event::where('id', $validated['event_id'])->first();
            $organizer->update([
                'active' => 0
            ]);
            return redirect()->route('event.admin')->with('success', 'Organizer deleted successfully');
        }
        catch (Exception $e) {
            return redirect()->route('event.admin')->with('error', 'Organizer not found');
        }

    }

    function create() {
        $organizers = Organizer::where('active', 1)->get();
        $categories = EventCategory::where('active', 1)->get();
        return view('event.insert', [
            'organizers' => $organizers,
            'categories' => $categories
        ]);

    }

    function update(Request $request, $id) {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i:s',
            'organizer_id' => 'required',
            'event_category_id' => 'required',
            'tags' => 'required',
            'booking_url' => 'required|url',
            'venue' => 'required',

        ]);

        $validated['tags'] = json_encode(explode(',', $validated['tags']));

        try {
            
            $organizer = Event::where('id', $id)->firstOrFail();
            $organizer->update($validated);
            return redirect()->route('event.admin')->with('success', 'Organizer updated successfully');
        }

        catch (Exception $e) {
            return redirect()->route('event.admin')->with('error', $e->getMessage());
        }


    }
}
