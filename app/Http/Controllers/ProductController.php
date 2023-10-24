<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCondition;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $conditions = ProductCondition::all();
        $types = ProductType::all();
        return view('products.create', [
            'conditions' => $conditions,
            'types' => $types,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'fault' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10048',
            'condition_id' => 'required',
            'type_id' => 'required',
            'stock' => 'required',
        ]);

        $imagePath = $request->file('image')->store('products', 'public');
        $validatedData['image'] = $imagePath;
        $validatedData['stock'] = intval($validatedData['stock']);

        $create = Product::create($validatedData);

        if ($create) {
            // add flash for the success notification
            return redirect()->route('products.index')->with('success', 'New product has been added!');
        }

        return redirect()->route('products.index')->with('Failed', 'Error creating new product');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        $conditions = ProductCondition::all();
        $types = ProductType::all();
        return view('products.edit', [
            'conditions' => $conditions,
            'types' => $types,
            'product' => $product,
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        $rules = [
            'name' => 'required|max:255',
            'description' => 'required',
            'fault' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:10048',
            'condition_id' => 'required',
            'type_id' => 'required',
            'stock' => 'required',
        ];

        $validatedData = $request->validate($rules);
        $validatedData['stock'] = intval($validatedData['stock']);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:10048',
            ]);

            $imagePath = $request->file('image')->store('blogs', 'public');
            $validatedData['image'] = $imagePath;
        }


        $update = Product::where('id', $product->id)->update($validatedData);

        if ($update) {
            // add flash for the success notification
            return redirect()->route('products.index')->with('success', 'Product has been updated!');
        }

        return redirect()->route('products.index')->with('Failed', 'Product updating blog');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        // delete di tabel
        $destory = Product::destroy($product->id);

        if ($destory) {
            // add flash for the success notification
            return redirect()->route('products.index')->with('success', 'Product has been deleted!');
        }

        return redirect()->route('products.index')->with('Failed', 'Error deleting product');
    }
}
