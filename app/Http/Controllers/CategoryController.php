<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();

        if (request('includeProducts') == 1) {
            return view('categories.products', compact('categories'));
        }

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::get();

        return view('categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'parent_id' => 'sometimes|numeric|min:0', // max e t c
            'name' => 'required',
        ]);

        Category::create($validated);

        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        // dafault first category
        if ($id == 1) {
            return redirect()->route('categories.index');
        }

        $category = Category::findOrFail($id);
        $categories = Category::where('id', '!=', $id)->get();

        return view('categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        if ($id == 1) {
            return redirect()->route('categories.index');
        }

        $validated = $request->validate([
            'parent_id' => 'sometimes|numeric|min:0',
            'name' => 'required',
        ]);

        $category = Category::findOrFail($id);

        $category->update($validated);

        return redirect()->route('categories.index');
    }

    // 

    public function category_products($id)
    {
        $ids = collect();
        $products;

        if (request('includeChildren') == 1) {
            $categories = Category::where('parent_id', $id)->get();
            $categoryIds = $categories->pluck('id');
            $ids = $categoryIds->map(function ($item) { return $item; });
            $ids->push((int) $id);
            
            // $products = DB::table('products')->whereIn('category_id', $ids)->get(); dd($products);
            $products = Product::whereIn('category_id', $ids)->get();
        } else {
            $products = Product::where('category_id', $id)->get();
        }

        return view('products.index', compact('products'));
    }
}
