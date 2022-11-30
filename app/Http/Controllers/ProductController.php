<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::get();

        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
        ]);

        Product::create($validated);

        return redirect()->route('products.index');
    }

    public function edit(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::get();

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
        ]);

        $product = Product::findOrFail($id);

        $product->update($validated);

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('products.index');
    }
}
