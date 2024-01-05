<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::paginate(7)->withQueryString();
        $categories = Category::get();
        return view('item.index', compact('categories', 'items'));
    }
    public function createview()
    {
        $categories = Category::get();
        return view('item.create', compact('categories'));
    }
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

            // Validate the request data
            $request->validate($rules);

            $data = [
                'name' => $request->input('name'),
                'category_id' => $request->input('category_id'), // Fix the key to 'category_id'
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'owner' => $request->input('owner'),
                'publish' => $request->input('publish'),
            ];

            // Attempt to create the Item
            Item::create($data);

            session()->flash('successMessage', 'Successfully created!');
            return redirect()->route('item.index');
        } catch (\Exception $e) {
            // Handle any exceptions, e.g., log the error
            session()->flash('errorMessage', 'Sorry, something went wrong!');
            return back();
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
            session()->flash('successMessage', 'Successfully updated!');
            return redirect()->route('item.index');
        } catch (\Exception $e) {
            // Handle the exception here, you can log it or return an error response
            session()->flash('errorMessage', 'Sorry, something went wrong!');
            return back();
        }
    }
    public function delete($id)
    {
        try {
            // Use 'find' instead of 'where' to get the model instance by primary key
            $item = Item::where('item_id', $id);
            if ($item) {
                $item->delete();
                session()->flash('successMessage', 'Successfully deleted!');
                return redirect()->route('item.index');
            } else {
                session()->flash('errorMessage', 'Sorry, something went wrong!');
                return back();
            }
        } catch (\Exception $e) {
            // Log the exception or handle it in a way that makes sense for your application
            session()->flash('errorMessage', 'Sorry, something went wrong!');
            return back();
        }
    }
}
