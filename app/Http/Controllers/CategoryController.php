<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        DB::beginTransaction();

        try {
            //code...

            $validated['slug'] = Str::slug($request->name);
            Category::create($validated);
            DB::commit();
            return redirect()->route('admin.categories.index')->with('success', 'Create category success');
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollBack();

            // Log the error
            Log::error('Create category failed: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->route('admin.categories.index')->with('error', 'Failed to create category. Error: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        DB::beginTransaction();
        try {
            //code...
            $validated['slug'] = Str::slug($request->name);
            $category->update($validated);
            DB::commit();
            return redirect()->route('admin.categories.index')->with('success', 'Edit user success!');
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollBack();

            // Log the error
            Log::error('Edit category failed: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->route('admin.categories.index')->with('error', 'Failed to edit category. Error: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        DB::beginTransaction();

        try {
            $category->delete();
            DB::commit();
            return redirect()->back()->with('success', 'delete user success!~');
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollBack();

            // Log the error
            Log::error('Delete category failed: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error', 'Failed to delete category. Error: ' . $e->getMessage());
        }
    }
}
