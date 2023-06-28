<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|min:5|max:255',
            'slug'   => 'unique:categories|max:255',
        ]);

        Category::create([
            'user_id'     => auth()->user()->id,
            'name'       => $request->name,
            'slug'       => $request->slug,
        ]);

        return redirect()->route('admin.category.index')->with([
            'message' => 'Kategori berhasil ditambahkan',
            'type'    => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('pages.admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->update([
            'name'       => $request->name,
            'slug'       => $request->slug,
        ]);

        return redirect()->route('admin.category.index')->with([
            'message' => 'kategori berhasil diperbarui',
            'type'    => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.category.index')->with([
            'message' => 'Berita berhasil dihapus',
            'type'    => 'success',
        ]);
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
