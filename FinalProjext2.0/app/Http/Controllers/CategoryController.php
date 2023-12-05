<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function create()
    {
        return view('categories/create');
    }

    public function edit($id)
    {
        $category = Category::where('id', $id)->first();

        return view('categories/edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $newName = $request->input('category_name');

        if (!$category) {
            return redirect()->back()->with('error', 'Category not found');
        }

        if($newName != $category->name){
            $request->validate([
                'category_name' => 'required|unique:categories,name|max:255',
            ]);
            
            $category->name = $request->input('category_name');
            $category->save();
        }

        return redirect()->route('index')->with('success', 'Category updated successfully');
    }

    public function store(Request $request, category $category)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,name|max:255',
        ]);

        $category->create([
            'name' => $request->input('category_name'),
        ]);

        return redirect()->route('index')->with('success', 'Category updated successfully');
    }

    public function index()
    {
        $categories = category::all();

        return view('categories/index', ['categories' => $categories]);
    }
}
