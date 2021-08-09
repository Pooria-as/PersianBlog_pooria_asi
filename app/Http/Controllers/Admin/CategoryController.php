<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Dashbord.Category.index")->with('categories',Category::all());
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
            "name"=>"required"
        ],
        [
            "name.required"=>"لطفا دسته بندی را وارد کنید"
        ]);

        Category::create([
            "name"=>$request->name
        ]);


        return back()->with("success","دسته بندی با موفقیت ساخته شد");
    }

    public function show($id)
    {
        //
    }

    public function edit(Category $Category)
    {
   
        // dd($Category->toArray());
         return view("Dashbord.Category.index",compact("Category"))
         ->with('categories',Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Category $Category)
    {
        $request->validate([
            "name"=>"required|unique:categories"
        ],
        [
            "name.required"=>"لطفا دسته بندی را وارد کنید",
            "name.unique"=>"دسته بندی وجود دارد"
        ]);

        $Category->update([
            "name"=>$request->name
        ]);


        return back()->with("success","دسته بندی با موفقیت ویرایش شد");
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $Category)
    {
        if($Category->posts()->count() > 0)
    {
        return back()->with("success","دسته بندی دارای پست است نمی توانید پاک کنید");
    }
    else{
        $Category->delete();
        return redirect(route("Category.index"))->with("success","دسته بندی با موفقیت پاک شد");


    }
    }
}
