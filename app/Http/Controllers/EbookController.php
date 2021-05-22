<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EbookCategory;
use App\Subcategory;
use App\Ebook;

class EbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Ebook::all();
        return view('admin.ebook.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $c=EbookCategory::all();
        return view('admin.ebook.create',compact('c'));
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
            'title'=>'required',
            'author'=>'required',
            'pages'=>'required',
            'publish'=>'required',
            'description'=>'required',
            'picture'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pdf'=>'required|mimetypes:application/pdf|max:10000'
        ]);
        $picture = $request->file('picture');
        $new_pic = rand(). "." . $picture->getClientOriginalExtension();
        $picture->move(public_path('upload'), $new_pic);


        $pdf = $request->file('pdf');
        $new_pdf = rand(). "." . $pdf->getClientOriginalExtension();
        $pdf->move(public_path('upload'), $new_pdf);

        $data = array(
            'ebookcategory_id'=>$request->get('cat'),
            'title'=>$request->get('title'),
            'author'=>$request->get('author'),
            'pages'=>$request->get('pages'),
            'published_on'=>$request->get('publish'),
            'description'=>$request->get('description'),
            'like'=>'0',
            'dislike'=>'0',
            'uploaded_by'=>session('admin_name'),
            
            'picture'  =>$new_pic,
            'ebook'  =>$new_pdf,
            'status'=>'Running'
        );

        Ebook::create($data);
       

        return redirect('admin/ebook')->with('insert','Ebook Inserted');
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
        $data=Ebook::find($id);
        $c=EbookCategory::all();
        return view('admin.ebook.edit',compact('data','c'));
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
        

        $c=Ebook::find($id);
        $c->ebookcategory_id=$request->get('cat');
        $c->title=$request->get('title');
        $c->author=$request->get('author');
        $c->pages=$request->get('pages');
        $c->published_on=$request->get('publish');
        $c->description=$request->get('description');
        if($request->hasfile('picture'))
        {
            $image=$request->file('picture');
            $ex=$image->getClientOriginalExtension();
            $fn=time().".".$ex;
            $image->move(public_path('upload/'), $fn);
            $c->picture =$fn;
        }
        if($request->hasfile('pdf'))
        {
            $pdf=$request->file('pdf');
            $ex=$pdf->getClientOriginalExtension();
            $new_pdf=time().".".$ex;
            $pdf->move(public_path('upload/'), $new_pdf);
            $c->ebook =$new_pdf;
        }
        $c->save();
        return redirect('admin/ebook/view')->with('update','Ebook Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Ebook::find($id);
        $p= $data->picture;
        if(file_exists(public_path('upload/'.$p)))
        {
           unlink(public_path('upload/'.$p));
        }
        $e= $data->ebook;
        if(file_exists(public_path('upload/'.$e)))
        {
           unlink(public_path('upload/'.$e));
        }
        $data->delete();
        return redirect()->back()->with('delete','Ebook Deleted');
    }


    /**
     * Block the blog content uploaded by user
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function block($id)
    {
        $x=Ebook::find($id);
        $x->status='Blocked';
        $x->save();
        return redirect()->back()->with('status','Ebook Blocked');
    }

    /**
     * update  like.
     *
     * @return \Illuminate\Http\Response
     */
    public function like($id)
    {
        $data=Ebook::find($id);
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
    public function dislike($id)
    {
        $data=Ebook::find($id);
        $pre= $data->dislike;

        $new=$pre+1;

        $data->dislike=$new;
        $data->save();
        return redirect()->back();
    }

}
