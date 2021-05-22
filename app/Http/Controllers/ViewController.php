<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\EbookCategory;
use App\Blog;
use App\Video;
use App\Ebook;
use App\Comment;
use App\QuestionPaper;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Comment::all();
        return view('admin.comment.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $c=Category::all();
        $main=Blog::orderBy('id','DESC')->limit(4)->get();
        $t=Blog::where('category_id','3')->orderBy('id','DESC')->limit(4)->get();
        $m=Blog::where('category_id','2')->orderBy('id','DESC')->limit(4)->get();
        $e=EbookCategory::all();
        return view('home',compact('t','c','m','main','e'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display a single page of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function single($id)
    {
        if(Auth::check())
        {
            $data=Blog::find($id);
            $c = Category::all();
            $e=EbookCategory::all();
            $main=Blog::orderBy('id','DESC')->limit(4)->get();
            return view('single',compact('data','c','main','e'));
         }
        else{
            return redirect('/login')->with('no','Please Login First To Proceed.');
        }
    }

    /**
     * Display a single page of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function singlevideo($id)
    {
        if(Auth::check())
        {
            $data=Video::find($id);
            $c = Category::all();
            $e=EbookCategory::all();
            $main=Video::orderBy('id','DESC')->limit(4)->get();
            return view('singlevideo',compact('data','c','main','e'));
         }
        else{
            return redirect('/login')->with('no','Please Login First To Proceed.');
        }
    }

     /**
     * Display a search page of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchpage()
    {
        $c=Category::all();
        $e=EbookCategory::all();
        return view('search',compact('c','e'));
    }

    /**
     * Display a search content of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $s= $request->get('search');

        $data=Blog::where('tags','LIKE',"%{$s}%")->get();
        //print_r($data);
        $c=Category::all();
        $e=EbookCategory::all();
        return view('searches',compact('data','c','e'));
    }

    /**
     * Display a search content of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function content($id)
    {
        $blogs=Blog::where('category_id',$id)->get();
        $video=Video::where('category_id',$id)->get();
        $n=Category::find($id);
        $c = Category::all();
        $e=EbookCategory::all();
        return view('content',compact('blogs','c','n','video','e'));
        //print_r($blogs);
    }  
    /**
     * Display a ebook of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ebookpage($id)
    {
       $content=Ebook::where('ebookcategory_id',$id)->get();
       $data=Ebook::all();
       $c = Category::all();
       $e = EbookCategory::all();
       $n=EbookCategory::find($id);
       return view('ebook',compact('data','c','content','e','n'));
    }   


    /**
     * Display a singlebook page of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function singlebook($id)
    {
        if(Auth::check())
        {
            $data=Ebook::find($id);
            $c = Category::all();
            $e=EbookCategory::all();
            $main=Blog::orderBy('id','DESC')->limit(4)->get();
            return view('singlebook',compact('data','c','main','e'));
        }
        else{
            return redirect('/login')->with('no','Please Login First To Proceed.');
        }
    }


    /**
     * comment of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function comment(Request $request, $id,$type)
    {
         $request->validate([
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ]);

        $c=new Comment([
            'post_id'=>$id,
            'type'=>$type,
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'subject'=>$request->get('subject'),
            'message'=>$request->get('message'),
        ]);
        $c->save();
        return redirect()->back()->with('insert','Comment value Sent');
    }
    /**
     * Display a search page of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function question_papers()
    {
        if(Auth::check())
        {
            $data=QuestionPaper::all();
            $c=Category::all();
            $e=EbookCategory::all();
            return view('question_paper',compact('data','c','e'));
        }
        else{
            return redirect('/login')->with('no','Please Login First To Proceed.');
        }
    }


}

