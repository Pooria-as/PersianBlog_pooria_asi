<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Dashbord.Tag.index")->with('tags',Tag::all());
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
            "name.required"=>"لطفا تگ را وارد کنید"
        ]);

        Tag::create([
            "name"=>$request->name
        ]);


        return back()->with("success","تگ با موفقیت ساخته شد");
    }

    public function show($id)
    {
        //
    }

    public function edit(Tag $Tag)
    {
   
        // dd($Category->toArray());
         return view("Dashbord.Tag.index",compact("Tag"))
         ->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Tag $Tag)
    {
        $request->validate([
            "name"=>"required|unique:categories"
        ],
        [
            "name.required"=>"لطفا تگ را وارد کنید",
            "name.unique"=>"تگ وجود دارد"
        ]);

        $Tag->update([
            "name"=>$request->name
        ]);


        return back()->with("success","تگ با موفقیت ویرایش شد");
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $Tag)
    {
        if($Tag->posts->count() >0)
    {
        return back()->with("success"," تگ دارای پست است نمی توانید پاک کنید");
    }
    else{
        $Tag->delete();
        return redirect(route("Tag.index"))->with("success","تگ با موفقیت پاک شد");


    }
    
}
}