<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Models\Tiket;
use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function index(){
        $categories = Category::all();
        $news = News::all();
        $tiket = Tiket::all();

        return view('pages.client.index', compact('categories', 'news', 'tiket'));
    }

    public function blog(){
        $categories = Category::all();
        $news = News::all();

        return view('pages.client.blog', compact('categories', 'news'));
    }

    public function detail(News $news){
        
        $categories = Category::all();
        $newsAll = News::all();

        return view('pages.client.detail', compact('news', 'categories', 'newsAll'));
    } 
    
    public function store(Request $request)
    {
        $request->validate([
            'jumlah' => 'required',
        ]);

        Transaksi::create([
            'user_id'     => auth()->user()->id,
            'jumlah'      => $request->jumlah,
            'tiket_id'    => $request->tiket_id,
        ]);

        return redirect()->route('show.transaksi', $request->slug)->with([
            'message' => 'Tiket berhasil dipesan',
            'type'    => 'success',
        ]);
    }

    public function show(Tiket $tiket){
        return view ('pages.client.transaksi', compact('tiket'));
    }



    
}
