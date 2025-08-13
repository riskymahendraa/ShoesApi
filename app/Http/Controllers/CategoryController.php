<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
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
        ])
        ;
        
        $categories = Category::create($validated);
        return response()->json([
            'message' => 'Category created successfully',
            'data' => $categories
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Category::find($id);
        return response()->json($categories);
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
        ]);
        
        $categories = Category::find($id);
        $categories->update($validated);
        return response()->json([
            'message' => 'Category updated successfully',
            'data' => $categories
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = Category::find($id);
        $categories->delete();
        return response()->json([
            'message' => 'Category deleted successfully',
            'data' => $categories
        ], 200);
    }
}
