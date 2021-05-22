<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Blog;
use App\Video;
use App\Ebook;
use App\Comment;
use App\QuestionPaper;
use App\User;

class AdminController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!session('admin_name'))
        {
             return redirect('admin/login');
        }
        //like
        $b=Blog::pluck('like');
        $x=0;
       for($i=0;$i<count($b);$i++)
       {
           $x= $x+$b[$i];
       }
       //dislike
        $b=Blog::pluck('dislike');
        $y=0;
       for($j=0;$j<count($b);$j++)
       {
           $y= $y+$b[$j];
       }
       $c=Comment::count();
       $u=User::count();
       $q=QuestionPaper::count();
       $blog=Blog::count();
       $video=Video::count();
       $e=Ebook::count();

        return view('admin.home')->with('like',$x)->with('dislike',$y)->with('user',$u)->with('blog',$blog)->with('video',$video)->with('comment',$c)->with('ebook',$e)->with('ques',$q);
    }


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginform()
    {
        return view('admin.login');
    }

    /**
     * Create the session of the user
     *
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'         => 'required',
            'password'      => 'required'
        ]);
        $admin = DB::table('admins')->where('email',$request->get('email'))->where('password',md5($request->get('password')))->count();
        if($admin>0)
        {
            session(['admin_name' => 'Admin']);
            session(['admin_email' => $request->get('email')]);
             return redirect('admin');
        }
        else
        {
            return redirect('admin')->with('status', 'Wrong Email/Password!');
        }
    }



      /**
     * Destroy the session of the user
     *
     */
    public function logout()
    {
        // Forget multiple keys...
        session()->forget(['admin_name', 'admin_email']);
        return redirect('admin');
    }
}
