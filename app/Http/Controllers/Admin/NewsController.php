<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.admin.news.index', compact('news'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.admin.news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|min:5|max:255',
            'content' => 'required|min:5',
            'slug'    => 'unique:news',
            'image'   => 'required|file|max:4024',
        ]);

        News::create([
            'user_id'     => auth()->user()->id,
            'title'       => $request->title,
            'slug'        => $request->slug,
            'content'     => $request->content,
            'excerpt'     => $request->exerpt = Str::limit(strip_tags($request->content), 200),
            'image'       => $request->file('image')->store('post-image'),
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.news.index')->with([
            'message' => 'Berita berhasil ditambahkan',
            'type'    => 'success',
        ]);
    }


    public function edit(News $news)
    {
        $categories = Category::all();

        return view('pages.admin.news.edit', compact('news', 'categories'));
    }

    public function update(Request $request, News $news)
    {
        $rules = [
            'title' => 'required|max:255',
            'image' => 'file|max:4024',
            'content' => 'required|min:5',
        ];

        if($request->slug != $news->slug){
            $rules['slug'] = 'unique:news';
        }

        $validateData =$request->validate($rules);
        
        if($request->file('image')){
            if($news->first()->image){
                Storage::delete($news->first()->image);
            }
            $validateData['image'] = $request->file('image')->store('post-image');
        }


        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->content), 200);

        $news->update($validateData);
            
        return redirect()->route('admin.news.index')->with([
            'message' => 'Berita berhasil diperbarui',
            'type'    => 'success',
        ]);
    }

    public function destroy(News $news)
    {
        if($news->first()->image){
            Storage::delete($news->first()->image);
        }
        $news->delete();

        return redirect()->route('admin.news.index')->with([
            'message' => 'Berita berhasil dihapus',
            'type'    => 'success',
        ]);
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(News::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}