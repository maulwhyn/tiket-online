<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(10);
        $transaksi = Transaksi::all();
        return view('pages.admin.index', compact('news', 'transaksi'));
    }

    public function profile(){
        return view ('pages.admin.profile');
    }
}
