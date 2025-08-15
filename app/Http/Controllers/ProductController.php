<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate
        ([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'image' => 'required|string',
            'sizes' => 'required|array',
            'sizes.*.id' => 'required|exists:sizes,id',
            'sizes.*.stock' => 'required|integer|min:1',
            'is_new_arrival' => 'required|boolean',
        ]);

        
        $product = Product::create($validated);
        
        $pivotData = [];
        foreach ($validated['sizes'] as $size) {
            $pivotData[$size['id']] = ['stock' => $size['stock']];
        }
        
        $product->sizes()->attach($pivotData);
        return response()->json([
            'message' => 'Product created successfully',
            'data' => $product->load('sizes')
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate
        ([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'image' => 'required|string',
            'is_new_arrival' => 'required|boolean',
        ]);
            $product = Product::find($id);
            $product->update($validated);
            return response()->json
        ([
            'message' => 'Product updated successfully',
            'data' => $product
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json
        ([
            'message' => 'Product deleted successfully',
            'data' => $product
        ], 200);
    }
}
