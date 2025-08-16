<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'sku'   => 'required|unique:products',
            'price' => 'required|numeric',
        ]);

        $product = new Product();
        $product->name   = $request->name;
        $product->sku    = $request->sku;
        $product->price  = $request->price;
        $product->status = $request->status ?? 'Inactive';

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('upload/products'), $filename);
            $product->image = $filename;
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name'  => 'required',
            'sku'   => 'required|unique:products,sku,' . $id,
            'price' => 'required|numeric',
        ]);

        $product->name   = $request->name;
        $product->sku    = $request->sku;
        $product->price  = $request->price;
        $product->status = $request->status ?? 'Inactive';

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('upload/products'), $filename);
            $product->image = $filename;
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
