<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::getOrdered();

        return view('categories.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.form', [
            'title' => 'Add new category'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255', Rule::unique('categories')],
            'order_no' => ['required', 'integer']
        ]);

        $category = Category::create([
            'name' => $request->name,
            'order_no' => $request->order_no
        ]);

        return redirect()->route('categories.list');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::where('id', $id)->firstOrFail();
        return view('categories.form', [
            'title' => 'Edit category',
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::where('id', $id)->firstOrFail();

        $request->validate([
            'name' => ['required', 'max:255', Rule::unique('categories')->ignore($category->id)],
            'order_no' => ['required', 'integer', 'unique:categories,order_no']
        ]);

        $category->name = $request->name;
        $category->order_no = $request->order_no;
        $category->save();

        return redirect()->route('categories.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::where('id', $id)->firstOrFail();
        $category->delete();

        return redirect()->route('categories.list');
    }
}
