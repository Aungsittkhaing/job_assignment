<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Validate input data
        $request->validate([
            'categoryName' => 'required|string|max:255',
            'categoryDescription' => 'nullable|string',
        ]);

        // Create a new category
        $data = [
            'title' => $request->input('categoryName'),
            'description' => $request->input('categoryDescription', null),
        ];

        try {
            Category::create($data);
            return back()->with(['success' => 'Category successfully created!']);
        } catch (\Exception $e) {
            // Handle any exceptions, e.g., log the error
            return back()->withErrors(['error' => 'Error creating category']);
        }
    }

    public function delete($id)
    {
        try {
            // Use 'find' instead of 'where' to get the model instance by primary key
            $category = Category::where('id', $id);
            if ($category) {
                $category->delete();
                return back()->with(['successDelete' => 'Successfully Deleted!']);
            } else {
                return back()->withErrors(['error' => 'Category not found']);
            }
        } catch (\Exception $e) {
            // Log the exception or handle it in a way that makes sense for your application
            return back()->withErrors(['error' => 'Error occurred during deletion. Please try again.']);
        }
    }
    public function edit($id)
    {
        $categoryData = Category::where('id', $id)->first();
        return view('category.edit', compact('categoryData'));
    }
    public function update($id, Request $request)
    {
        $updateData = [
            'title' => $request->categoryName,
            'description' => $request->categoryDescription
        ];
        Category::where('id', $id)->update($updateData);
        return redirect()->route('category.index');
    }
}
