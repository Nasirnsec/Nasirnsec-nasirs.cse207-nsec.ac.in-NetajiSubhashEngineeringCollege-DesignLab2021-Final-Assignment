<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Category::all();
        return view('admin.category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'cat'=>'required'
        ]);

        if (Category::where('category_name', '=', $request->get('cat'))->exists()) {
        return redirect('admin/category')->with('duplicate','Duplicate Data');
      }

        $c=new Category([
            'category_name'=>$request->get('cat')
        ]);
        $c->save();
        return redirect('admin/category')->with('insert','Category value Inserted');
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
        $data=Category::find($id);
        return view('admin.category.edit',compact('data'));
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
            'cat'=>'required'
        ]);

        $c=Category::find($id);
        $c->category_name=$request->get('cat');
        $c->save();
        return redirect('admin/category/view')->with('update','Category Updated');
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
            $c = Category::find($id);
            $c->delete();
            DB::commit();
            return redirect()->back()->with('success','Category Deleted');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error','Category Cannot Be Deleted as Subcategory exist of this Category');
        }
    }
}
