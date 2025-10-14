<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
class HouseController extends Controller
{
    public function index() {
        $houses = House::all();
        return view('houses.index', compact('houses'));
    }

    public function create() {
        return view('houses.create');
    }
    public function store(Request $request) {
        // Validate and store the house data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'address' => 'required|string|max:255',
        ]);

        House::create($validated);
        return redirect()->route('houses.index')->with('success', 'House created successfully.');
    }

    public function details($id) {
        $house = House::findOrFail($id);
        return view('houses.details', compact('house'));
    }
}
