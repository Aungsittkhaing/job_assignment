<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //api for list
    public function index()
    {
        $categories = Category::latest("id")->paginate(5);
        return response()->json(['categories' => $categories], 200);
    }
    //api for list

    //api for create
    public function create(Request $request)
    {
        // Validate input data
        $request->validate([
            'categoryName' => 'required|string|max:255',
            'categoryDescription' => 'nullable|string',
        ]);

        $data = [
            'title' => $request->input('categoryName'),
            'description' => $request->input('categoryDescription', null),
        ];

        try {
            $category = Category::create($data);
            return response()->json([
                'message' => 'Successfully created!',
                'category' => $category,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Sorry, something went wrong!',
            ], 500);
        }
    }
    //api for create

    //api for delete
    public function delete($id)
    {
        try {
            $category = Category::find($id);

            if ($category) {
                $category->delete();
                return response()->json(['message' => 'Successfully deleted!']);
            } else {
                return response()->json(['error' => 'Category not found.'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Sorry, something went wrong.'], 500);
        }
    }
    //api for delete

    //api for edit
    public function edit($id)
    {
        $categoryData = Category::find($id);

        if (!$categoryData) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        return response()->json(['data' => $categoryData], 200);
    }
    //api for edit

    //api for update
    public function update($id, Request $request)
    {
        try {
            $updateData = [
                'title' => $request->input('categoryName'),
                'description' => $request->input('categoryDescription')
            ];

            $category = Category::findOrFail($id);
            $category->update($updateData);

            return response()->json(['message' => 'Successfully updated!']);
        } catch (\Exception $e) {
            // Handle the exception here, you can log it or return an error response
            return response()->json(['error' => 'Sorry, something went wrong!'], 500);
        }
    }
    //api for update

}
