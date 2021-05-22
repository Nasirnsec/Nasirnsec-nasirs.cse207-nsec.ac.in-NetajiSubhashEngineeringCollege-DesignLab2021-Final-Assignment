<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\EbookCategory;
use App\Blog;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $c=Category::all();
        $main=Blog::orderBy('id','DESC')->limit(8)->get();
        $t=Blog::where('category_id','3')->orderBy('id','DESC')->limit(4)->get();
        $m=Blog::where('category_id','2')->orderBy('id','DESC')->limit(4)->get();
        $e=EbookCategory::all();
        return view('home',compact('t','c','m','main','e'));
    }
}
