<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;


class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiket = Tiket::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.admin.tiket.index', compact('tiket'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.tiket.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|min:5|max:255',
            'content' => 'required|min:5',
            'harga'   => 'required',
            'image'   => 'required|file|max:4024',
        ]);

        Tiket::create([
            'user_id'     => auth()->user()->id,
            'title'       => $request->title,
            'content'     => $request->content,
            'excerpt'     => $request->exerpt = Str::limit(strip_tags($request->content), 38),
            'harga'       => $request->harga,
            'image'       => $request->file('image')->store('post-image'),
        ]);

        return redirect()->route('admin.tiket.index')->with([
            'message' => 'Tiket berhasil ditambahkan',
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
    public function edit(Tiket $tiket)
    {
        return view('pages.admin.tiket.edit', compact('tiket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tiket $tiket)
    {
        $rules = [
            'title' => 'required|max:255',
            'image' => 'file|max:4024',
            'harga' => 'required',
            'content' => 'required|min:5',
        ];

        if($request->slug != $tiket->slug){
            $rules['slug'] = 'unique:tikets';
        }

        $validateData =$request->validate($rules);
        
        if($request->file('image')){
            if($tiket->first()->image){
                Storage::delete($tiket->first()->image);
            }
            $validateData['image'] = $request->file('image')->store('post-image');
        }


        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->content), 38);

        $tiket->update($validateData);
            
        return redirect()->route('admin.tiket.index')->with([
            'message' => 'Berita berhasil diperbarui',
            'type'    => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tiket $tiket)
    {
        if($tiket->first()->image){
            Storage::delete($tiket->first()->image);
        }
        $tiket->delete();

        return redirect()->route('admin.tiket.index')->with([
            'message' => 'Berita berhasil dihapus',
            'type'    => 'success',
        ]);
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Tiket::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}