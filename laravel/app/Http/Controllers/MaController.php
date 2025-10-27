<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class MaController extends Controller
{
    // GET /api/data
    public function index()
    {
        // Get all items from the database
        $items = Item::all();
        return response()->json($items);
    }

    // POST /api/data
    public function store(Request $request)
    {
        // Validate input (optional but recommended)
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'nullable|integer'
        ]);

        // Create new item
        $item = Item::create($request->all());

        return response()->json([
            'message' => 'Item created successfully',
            'item' => $item
        ], 201);
    }

    // PUT /api/data/{id}
    public function update(Request $request, $id)
    {
        // Find the item by ID
        $item = Item::findOrFail($id);

        // Validate input
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'age' => 'nullable|integer'
        ]);

        // Update the item
        $item->update($request->all());

        return response()->json([
            'message' => 'Item updated successfully',
            'item' => $item
        ]);
    }

    // DELETE /api/data/{id}
    public function destroy($id)
    {
        // Find the item by ID
        $item = Item::findOrFail($id);

        // Delete the item
        $item->delete();

        return response()->json([
            'message' => 'Item deleted successfully'
        ]);
    }
}
