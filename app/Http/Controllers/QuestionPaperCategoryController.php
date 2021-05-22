<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\QuestionPaperCategory;

class QuestionPaperCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=QuestionPaperCategory::all();
        return view('admin.question_paper_category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.question_paper_category.create');
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
            'quecat'=>'required'
        ]);
        $c=new QuestionPaperCategory([
            'quecategory_name'=>$request->get('quecat')
        ]);
        $c->save();
        return redirect('admin/quecategory')->with('insert','Queston Paper Category value Inserted');
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
        $data=QuestionPaperCategory::find($id);
        return view('admin.question_paper_category.edit',compact('data'));
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
            'quecat'=>'required'
        ]);

        $c=QuestionPaperCategory::find($id);
        $c->quecategory_name=$request->get('quecat');
        $c->save();
        return redirect('admin/quecategory/view')->with('update','QuestionPaperCategory Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $c = QuestionPaperCategory::find($id);
            $c->delete();
            DB::commit();
            return redirect()->back()->with('success','QuestionPaperCategory Deleted');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error','QuestionPaperCategory Cannot Be Deleted as Subcategory exist of this Category');
        }
    }
}
