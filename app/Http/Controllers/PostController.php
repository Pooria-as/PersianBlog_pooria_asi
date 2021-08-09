<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    
    {
        $lastesNews=DB::table('posts')->latest()->get();
        // dd($lastesNews);

        

        $mostView=DB::table("posts")->where("view",">","5")->get();
        $sports=Post::where("category_id",1)->get();
        // dd($Sportposts->toarray());
        return view("theme.index",compact("lastesNews","mostView","sports"))->with("categories",Category::all())
        ->with("posts",Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function single(Post $post)
    {
        $categories=Category::all();
        $tags=Tag::all();
        $lastesNews=DB::table('posts')->latest()->get();
        $post->view=++$post->view;
        $post->save();
        
        return view("theme.single",compact("post","categories","tags","lastesNews"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

   public function like(Post $post)
   {
    //   dd($post->toArray());
      $post->update([
          "like"=>$post->like++
      ]);

      return back();
   }


   public function disslike(Post $post)
   {
    //   dd($post->toArray());
      $post->update([
          "Disslike"=>$post->Disslike++
      ]);

      return back();
   }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
