<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return response()->json($brands);
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
        ]);

        $brand = Brand::create($validated);
        return response()->json([
            'message' => 'Brand created successfully',
            'data' => $brand
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::find($id);
        return response()->json($brand);
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
        ])
        ;
        
        $brand = Brand::find($id);
        $brand->update($validated);
        return response()->json([
            'message' => 'Brand updated successfully',
            'data' => $brand
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return response()->json([
            'message' => 'Brand deleted successfully',
            'data' => $brand
        ], 200);
    }
}
