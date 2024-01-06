<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use App\Http\Resources\ItemResource;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //api item list
    public function index(Request $request)
    {
        $items = Item::latest("item_id")->paginate(7)->withQueryString();
        $categories = Category::get();

        return response()->json(['categories' => $categories, 'items' => $items], 200);
    }
    //api item list

    //api item create
    public function create(Request $request)
    {
        try {
            $rules = [
                'name' => 'required|string|max:255',
                'category_id' => 'required', // Validate existence in the 'categories' table
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'owner' => 'required|string|max:255',
                'publish' => 'required|boolean',
            ];
            $request->validate($rules);
            $data = [
                'name' => $request->input('name'),
                'category_id' => $request->input('category_id'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'owner' => $request->input('owner'),
                'publish' => $request->input('publish'),
            ];
            Item::create($data);
            return response()->json([
                'message' => 'Successfully created!',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Sorry, something went wrong!',
            ], 500);
        }
    }
    //api item create

    //api item delete
    public function delete($id)
    {
        try {
            $item = Item::where('item_id', $id);
            if ($item) {
                $item->delete();
                return response()->json(['message' => 'Successfully deleted!']);
            } else {
                return response()->json(['message' => 'Item not found!'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Sorry, something went wrong!'], 500);
        }
    }
    //delete api item

    //edit api item
    public function edit($id)
    {
        $itemData = Item::where('item_id', $id)->first();
        $categoryData = Category::get();

        if (!$itemData && !$categoryData) {
            return response()->json(['error' => 'Item is not found'], 404);
        }

        return response()->json(['data' => $itemData, 'category' => $categoryData], 200);
    }
    //edit api item

    //update api item
    public function update(Request $request, $id)
    {
        try {
            $updateData = [
                'name' => $request->name,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'price' => $request->price,
                'owner' => $request->owner,
                'publish' => $request->publish
            ];

            Item::where('item_id', $id)->update($updateData);

            return response()->json(['message' => 'Successfully updated!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Sorry, something went wrong!'], 500);
        }
    }
}
