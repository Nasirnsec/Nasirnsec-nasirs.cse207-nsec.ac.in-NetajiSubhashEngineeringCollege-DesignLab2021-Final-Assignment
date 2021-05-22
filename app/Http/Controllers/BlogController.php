<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Blog::all();
        return view('admin.blog.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $c=Category::all();
        return view('admin.blog.create',compact('c'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'cat'=>'required',
            'subcat'=>'required',
            'title'=>'required',
            'content'=>'required',
            'tags'=>'required',
            'picture'=>'required'
        ]);
        $picture = $request->file('picture');
        $new_name = rand(). "." . $picture->getClientOriginalExtension();
        $picture->move(public_path('upload'), $new_name);

        $data = array(
            'category_id'=>$request->get('cat'),
            'subcategory_id'=>$request->get('subcat'),
            'title'=>$request->get('title'),
            'content'=>$request->get('content'),
            'like'=>'0',
            'dislike'=>'0',
            'tags'=>$request->get('tags'),
            'uploaded_by'=>session('admin_name'),
            
            'picture'  =>$new_name,
            'status'=>'Running'
        );

        Blog::create($data);
       

        return redirect('admin/blog')->with('insert','Blog Inserted');
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
        $data=Blog::find($id);
        $c=Category::all();
        return view('admin.blog.edit',compact('data','c'));
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
        $request->validate([
            'cat'=>'required',
            'subcat'=>'required',
            'title'=>'required',
            'content'=>'required',
            'tags'=>'required'
        ]);

        $c=Blog::find($id);
        $c->category_id=$request->get('cat');
        $c->subcategory_id=$request->get('subcat');
        $c->title=$request->get('title');
        $c->content=$request->get('content');
        $c->tags=$request->get('tags');
        if($request->hasfile('picture'))
        {
            $image=$request->file('picture');
            $ex=$image->getClientOriginalExtension();
            $fn=time().".".$ex;
            $image->move(public_path('upload/'), $fn);
            $c->picture =$fn;
        }
        $c->save();
        return redirect('admin/blog/view')->with('update','Blog Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Blog::find($id);
        $e= $data->picture;
        if(file_exists(public_path('upload/'.$e)))
        {
           unlink(public_path('upload/'.$e));
        }
        $data->delete();
        return redirect()->back()->with('delete','Blog Deleted');
    }

       /**
     * get subcat according to cat.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getSubcat(Request $request)
    {
        $cat= $request->post('cat');
        
        $subcat=Subcategory::where('category_id',$cat)->get();
            return response()->json($subcat);
    }

    /**
     * Block the blog content uploaded by user
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function block($id)
    {
        $x=Blog::find($id);
        $x->status='Blocked';
        $x->save();
        return redirect()->back()->with('status','Blog Blocked');
    }


    /**
     * update  like.
     *
     * @return \Illuminate\Http\Response
     */
    public function likeb($id)
    {
        $data=Blog::find($id);
        $pre= $data->like;

        $new=$pre+1;

        $data->like=$new;
        $data->save();
        return redirect()->back();
    }


    /**
     * update  dislike.
     *
     * @return \Illuminate\Http\Response
     */
    public function dislikeb($id)
    {
        $data=Blog::find($id);
        $pre= $data->dislike;

        $new=$pre+1;

        $data->dislike=$new;
        $data->save();
        return redirect()->back();
    }
}
