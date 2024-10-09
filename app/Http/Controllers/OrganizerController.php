<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use Exception;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    //
    function index() {
        $organizers = Organizer::all()->where('active', 1);
        return view('organizer.index', [
            'organizers' => $organizers
        ]);
    }

    function detail($id) {
        $organizer = Organizer::findOrFail($id);
        return view('organizer.detail', compact('organizer'));
    }

    function delete(Request $request) {
        $validated = $request->validate([
            'organizer_id' => 'required|exists:organizers,id'
        ]);
        try {
            
            $organizer = Organizer::where('id', $validated['organizer_id'])->first();
            $organizer->update([
                'active' => 0
            ]);
            return redirect()->route('organizer.list')->with('success', 'Organizer deleted successfully');
        }
        catch (Exception $e) {
            return redirect()->route('organizer.list')->with('error', 'Organizer not found');
        }
    }

    function create() {
        return view('organizer.insert');
    }

    function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'facebook_link' => 'required|url',
            'x_link' => 'required|url',
            'website_link' => 'required|url',
        ]);

        try {
            Organizer::create($validated);
            return redirect()->route('organizer.list')->with('success', 'Organizer created successfully');
        }

        catch (Exception $e) {
            return redirect()->route('organizer.list')->with('error', $e->getMessage());
        }


    }

    function edit(Request $request) {
        $organizer = Organizer::where('id', $request->organizer_id)->first();
        return view('organizer.insert', [
            'organizer' => $organizer
        ]);

    }

    function update(Request $request, string $id) {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'facebook_link' => 'required|url',
            'x_link' => 'required|url',
            'website_link' => 'required|url',
        ]);

        try {
            
            $organizer = Organizer::where('id', $id)->firstOrFail();
            $organizer->update($validated);
            return redirect()->route('organizer.list')->with('success', 'Organizer updated successfully');
        }

        catch (Exception $e) {
            return redirect()->route('organizer.list')->with('error', $e->getMessage());
        }

    }



}
