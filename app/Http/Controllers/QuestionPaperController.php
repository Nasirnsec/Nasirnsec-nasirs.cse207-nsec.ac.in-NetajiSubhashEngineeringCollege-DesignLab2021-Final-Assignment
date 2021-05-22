<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestionPaperCategory;
use App\QuestionPaper;

class QuestionPaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=QuestionPaper::all();
        return view('admin.question_paper.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $c=QuestionPaperCategory::all();
        return view('admin.question_paper.create',compact('c'));
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
            'quecat'=>'required',
            'sem'=>'required',
            'subject'=>'required',
            'year'=>'required',
            'question_paper'=>'required|mimetypes:application/pdf|max:10000'
        ]);

        $question_paper = $request->file('question_paper');
        $new_question_paper = rand(). "." . $question_paper->getClientOriginalExtension();
        $question_paper->move(public_path('upload'), $new_question_paper);

        $data = array(
            'quecategory_id'=>$request->get('quecat'),
            'sem'=>$request->get('sem'),
            'subject'=>$request->get('subject'),
            'year'=>$request->get('year'),
            'question_paper'  =>$new_question_paper,
        );

        QuestionPaper::create($data);
       

        return redirect('admin/question_paper')->with('insert','Question Paper Inserted');
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
        $data=QuestionPaper::find($id);
        $c=QuestionPaperCategory::all();
        return view('admin.question_paper.edit',compact('data','c'));
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
        

        $c=QuestionPaper::find($id);
        $c->quecategory_id=$request->get('quecat');
        $c->sem=$request->get('sem');
        $c->subject=$request->get('subject');
        $c->year=$request->get('year');
        if($request->hasfile('question_paper'))
        {
            $question_paper=$request->file('question_paper');
            $ex=$question_paper->getClientOriginalExtension();
            $new_question_paper=time().".".$ex;
            $question_paper->move(public_path('upload/'), $new_question_paper);
            $c->question_paper =$new_question_paper;
        }
        $c->save();
        return redirect('admin/question_paper/view')->with('update','Question Paper Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=QuestionPaper::find($id);
        $e= $data->question_paper;
        if(file_exists(public_path('upload/'.$e)))
        {
           unlink(public_path('upload/'.$e));
        }
        $data->delete();
        return redirect()->back()->with('delete','Question Paper Deleted');
    }
}
