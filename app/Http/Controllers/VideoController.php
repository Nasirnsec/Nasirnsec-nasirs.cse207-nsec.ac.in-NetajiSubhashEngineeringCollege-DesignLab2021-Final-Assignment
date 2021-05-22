<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\Video;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Video::all();
        return view('admin.video.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $c=Category::all();
        return view('admin.video.create',compact('c'));
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
            'video'=>'required',
        ]);

        /*My computer video*/ 
         if($request->file('video')){
        $video = $request->file('video');
        $new_name = rand(). "." . $video->getClientOriginalExtension();
        $video->move(public_path('upload'), $new_name);
    	}

    	/*Youtube video*/
    	elseif($request->get('video'))
    	{
    		$url=$request->get('video');	
    		if(strlen($url) > 11)
        	{
	            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match))
	            {
	                $new_name= $match[1];
	            }
	            else
	                $new_name=' ';
        	}
		}
    	/* type of video*/
          if($request->get('type')){

          	$t=$request->get('type');
          }
          else{
          	$t=' ';
          }
        $data = array(
            'category_id'=>$request->get('cat'),
            'subcategory_id'=>$request->get('subcat'),
            'title'=>$request->get('title'),
            'content'=>$request->get('content'),
            'like'=>'0',
            'dislike'=>'0',
            'tags'=>$request->get('tags'),
            'uploaded_by'=>session('admin_name'),
            
            'video'  =>$new_name,
          
            'type'=>$t,

            'status'=>'Running'
      
        );

        Video::create($data);
       

        return redirect('admin/video')->with('insert','Video Inserted');
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
        $data=Video::find($id);
        $c=Category::all();
        return view('admin.video.edit',compact('data','c'));
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

        $c=Video::find($id);
        $c->category_id=$request->get('cat');
        $c->subcategory_id=$request->get('subcat');
        $c->title=$request->get('title');
        $c->content=$request->get('content');
        $c->tags=$request->get('tags');
        if($request->get('type')){
       	 $c->type=$request->get('type');
       	}
       	else
       	{
       		$c->type=' ';
       	}
       	/*My Computer video*/
        if($request->hasfile('video'))
        {
            $video=$request->file('video');
            $ex=$video->getClientOriginalExtension();
            $fn=time().".".$ex;
            $video->move(public_path('upload/'), $fn);
            $c->video =$fn;
        }
        /*Youtube video*/
    	elseif($request->get('video'))
    	{
    		$url=$request->get('video');	
    		if(strlen($url) > 11)
        	{
	            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match))
	            {
	                $c->video= $match[1];
	            }
	            else
	                $c->video=' ';
        	}
		}
        $c->save();
        return redirect('admin/video/view')->with('update','Video Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Video::find($id);
        $e= $data->video;
        if(file_exists(public_path('upload/'.$e)))
        {
           unlink(public_path('upload/'.$e));
        }
        $data->delete();
        return redirect()->back()->with('delete','Video Deleted');
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
        $x=Video::find($id);
        $x->status='Blocked';
        $x->save();
        return redirect()->back()->with('status','Video Blocked');
    }
    public function YoutubeID($url)
    {
        if(strlen($url) > 11)
        {
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match))
            {
                return $match[1];
            }
            else
                return false;
        }

        return $url;
    }

    /**
     * update  like.
     *
     * @return \Illuminate\Http\Response
     */
    public function likev($id)
    {
        $data=Video::find($id);
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
    public function dislikev($id)
    {
        $data=Video::find($id);
        $pre= $data->dislike;

        $new=$pre+1;

        $data->dislike=$new;
        $data->save();
        return redirect()->back();
    }
}
