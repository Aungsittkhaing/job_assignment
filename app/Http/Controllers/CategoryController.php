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
        $categories = Category::latest("id")->paginate(5)->withQueryString();
        return view('category.index', compact('categories'));
    }

    public function createview()
    {
        return view('category.create');
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
            session()->flash('successMessage', 'Successfully create!');
            return redirect()->route('category.index');
        } catch (\Exception $e) {
            session()->flash('errorMessage', 'Sorry, something went wrong!');
            return back();
        }
    }

    public function delete($id)
    {
        try {
            // Use 'find' instead of 'where' to get the model instance by primary key
            $category = Category::where('id', $id);
            if ($category) {
                $category->delete();
                session()->flash('successMessage', 'Successfully deleted!');
                return redirect()->route('category.index');
            } else {
                session()->flash('errorMessage', 'Sorry, something went wrong!');
                return back();
            }
        } catch (\Exception $e) {
            session()->flash('errorMessage', 'Sorry, something went wrong!');
            return back();
        }
    }
    public function edit($id)
    {
        $categoryData = Category::where('id', $id)->first();
        return view('category.edit', compact('categoryData'));
    }
    public function update($id, Request $request)
    {
        try {
            $updateData = [
                'title' => $request->categoryName,
                'description' => $request->categoryDescription
            ];

            Category::where('id', $id)->update($updateData);
            session()->flash('successMessage', 'Successfully updated!');

            return redirect()->route('category.index');
        } catch (\Exception $e) {
            // Handle the exception here, you can log it or return an error response
            session()->flash('errorMessage', 'Sorry, something went wrong!');
            return back();
        }
    }
}
