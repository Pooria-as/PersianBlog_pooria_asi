<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

use Illuminate\Support\Str;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Dashbord.Post.index")->with("posts",Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Dashbord.Post.create")
        ->with("categories",Category::all())
        ->with("tags",Tag::all());
         
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
            "title"=>"required|unique:posts",
            "description"=>"required|max:50",
            "image"=>"image|mimes:png,jpg",
            "content"=>"required"
        ], 
        [
            "title.required"=>"لطفا عنوان پست را وارد کنید",
            "title.unique"=>"عنوان پست تکراری است",
            "image"=>"لطفا عکس را وارد کنید",
            "content"=>"لطفا متن پست را وارد کنید"
        ]
    );


    $image=$request->file("image");
    $image_unique=hexdec(uniqid());
    $image_get_extention=strtoupper($image->getClientOriginalExtension());
    $image_name=$image_unique.".".$image_get_extention;
    $image_location ="Images/Posts/";
    $last_image=$image_location.$image_name;
    $image->move($image_location,$image_name);
 
  $post = Post::create([

    "title"=>$request->title,
    "category_id"=>$request->category,
    "slug"=>Str::slug($request->title),
    "user_id"=>auth()->user()->id,
    "image"=>$last_image,
  
    "content"=>$request->content,     
    "description"=>$request->description,     
  
    ]);


        if($post->tags)
        {
            $post->tags()->attach($request->tags);
        }


    return redirect()->route("Post.index")->with("success",'پست شما با موفیت اضافه شد ');


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
    public function edit(Post $Post)
    {
        return view("Dashbord.Post.create",compact("Post"))
        ->with("categories",Category::all())
        ->with("tags",Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $Post)
    {
      
        // $request->validate([
        //     "title"=>"required|unique:posts",
        //     "description"=>"required|max:50",
        //     "image"=>"image|mimes:png,jpg",
        //     "content"=>"required"
        // ], 
        // [
        //     "title.required"=>"لطفا عنوان پست را وارد کنید",
        //     "title.unique"=>"عنوان پست تکراری است",
        //     "image"=>"لطفا عکس را وارد کنید",
        //     "content"=>"لطفا متن پست را وارد کنید"
        // ]
        //      );




        $old_image=$request->old_image;
        $image=$request->file("image");
        if($image){
        $image_unique=hexdec(uniqid());
        $image_get_extention=strtoupper($image->getClientOriginalExtension());
        $image_name=$image_unique.".".$image_get_extention;
        $image_location ="Images/Posts/";
        $last_image=$image_location.$image_name;
        $image->move($image_location,$image_name);
        unlink($old_image);

        $Post->update([
          
            "title"=>$request->title,
            "category_id"=>$request->category,
            "slug"=>Str::slug($request->title),
            "user_id"=>auth()->user()->id,
            "image"=>$last_image,
            "content"=>$request->content,     
            "description"=>$request->description, 
          
        ]);
        if($Post->tags)
        {
            $Post->tags()->sync($request->tags);
        }
    }
      else{     
        $Post->update([
            "title"=>$request->title,
            "category_id"=>$request->category,
            "slug"=>Str::slug($request->title),
            "user_id"=>auth()->user()->id,     
            "content"=>$request->content,     
            "description"=>$request->description, 
        ]);

        
        if($Post->tags)
        {
            $Post->tags()->sync($request->tags);
        }
   
               
    }

   
    return redirect(route("Post.index"))->with("success","پست شما باموفیقیت ویرایش شد !");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $Post)
    {
        $Post->delete();
    return redirect()->route("Post.index")->with("success",'پست شما با موفیت حذف شد ');
        
    }
}
