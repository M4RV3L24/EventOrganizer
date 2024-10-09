<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\EventCategory;

class EventCategoryController extends Controller
{
    //
    function index() {
        $categories = EventCategory::all()->where('active', 1);
        return view('category.index', [
            'categories' => $categories
        ]);
    }

    function delete(Request $request) {
        $validated = $request->validate([
            'category_id' => 'required'
        ]);
        try {
            
            $category = EventCategory::where('id', $validated['category_id'])->first();
            $category->update([
                'active' => 0
            ]);
            return redirect()->route('category.list')->with('success', 'Category deleted successfully');
        }
        catch (Exception $e) {
            return redirect()->route('category.list')->with('error', $e->getMessage());
        }

    }

    function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);

        try {
            EventCategory::create($validated);
            return redirect()->route('category.list')->with('success', 'Category created successfully');
        }

        catch (Exception $e) {
            return redirect()->route('category.list')->with('error', $e->getMessage());
        }

    }

    function update(Request $request, $id) {
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);

        try {
            
            $organizer = EventCategory::where('id', $id)->firstOrFail();
            $organizer->update($validated);
            return redirect()->route('category.list')->with('success', 'Category updated successfully');
        }

        catch (Exception $e) {
            return redirect()->route('category.list')->with('error', $e->getMessage());
        }

    }

    function create() {
        return view('category.insert');
    }

    function edit(Request $request) {
        $category = EventCategory::where('id', $request->category_id)->first();
        return view('category.insert', [
            'category' => $category
        ]);

    }

}
