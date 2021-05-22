<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Subcategory::all();
        return view('admin.subcategory.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Category::all();
        return view('admin.subcategory.create',compact('data'));
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
            'subcat'=>'required'
        ]);
        $c=new Subcategory([
            'category_id'=>$request->get('cat'),
            'subcategory_name'=>$request->get('subcat')
        ]);
        $c->save();
        return redirect('admin/subcategory')->with('insert','Sub Category value Inserted');
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
        $c=Category::all();
        $data=Subcategory::find($id);
        return view('admin.subcategory.edit',compact('data','c'));
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
            'subcat'=>'required'
        ]);

        $c=Subcategory::find($id);
        $c->category_id=$request->get('cat');
        $c->subcategory_name=$request->get('subcat');
        $c->save();
        return redirect('admin/subcategory/view')->with('update','Sub Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Subcategory::find($id)->delete();
        return redirect()->back()->with('delete','Sub Category Deleted');
    }
}
