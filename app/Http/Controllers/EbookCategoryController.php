<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\EbookCategory;

class EbookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=EbookCategory::all();
        return view('admin.ebook_category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ebook_category.create');
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
            'ecat'=>'required'
        ]);
        $c=new EbookCategory([
            'ebookcategory_name'=>$request->get('ecat')
        ]);
        $c->save();
        return redirect('admin/ebookcategory')->with('insert','EbookCategory value Inserted');
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
        $data=EbookCategory::find($id);
        return view('admin.ebook_category.edit',compact('data'));
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
            'ecat'=>'required'
        ]);

        $c=EbookCategory::find($id);
        $c->ebookcategory_name=$request->get('ecat');
        $c->save();
        return redirect('admin/ebookcategory/view')->with('update','EbookCategory Updated');
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
            $c = EbookCategory::find($id);
            $c->delete();
            DB::commit();
            return redirect()->back()->with('success','EbookCategory Deleted');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error','EbookCategory Cannot Be Deleted as Subcategory exist of this EbookCategory');
        }
    }
}
