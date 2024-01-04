<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::get();
        $categories = Category::get();
        return view('item.index', compact('categories', 'items'));
    }
    public function create(Request $request)
    {
        try {
            $rules = [
                'name' => 'required|string|max:255',
                'category_id' => 'required', // Assuming categories table has 'id' field
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'owner' => 'required|string|max:255',
                'publish' => 'required|boolean',
            ];

            // Validate the request data
            $request->validate($rules);

            $data = [
                'name' => $request->name,
                'category_id' => $request->category_id, // Fix the key to 'category_id'
                'description' => $request->description,
                'price' => $request->price,
                'owner' => $request->owner,
                'publish' => $request->publish,
            ];

            // Attempt to create the Item
            Item::create($data);

            return back()->with(['success' => 'Item successfully created!']);
        } catch (\Exception $e) {
            // Handle any exceptions, e.g., log the error
            return back()->withErrors(['error' => 'Error creating category']);
        }
    }
    public function edit($id)
    {
        $itemData = Item::where('item_id', $id)->first();
        $categories = Category::get();
        return view('item.edit', compact('itemData', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $updateData = [
            'name' => $request->name,
            'category_id' => $request->category_id, // Fix the key to 'category_id'
            'description' => $request->description,
            'price' => $request->price,
            'owner' => $request->owner,
            'publish' => $request->publish
        ];
        Item::where('item_id', $id)->update($updateData);
        return redirect()->route('item.index');
    }
}
