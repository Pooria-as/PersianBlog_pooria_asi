<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
  


    public function index()
    {
        return view("Dashbord.Comment.index")->with("comments",Comment::all());
    }


    public function show($id)
    {
        //
    }

    public function Disable(Comment $comment)
    {
        $comment->status="Disable";
        $comment->save();

        return back();
    }
    
    public function Enable(Comment $comment)
    {
        $comment->status="Enable";
        $comment->save();
        return back();

    }


    
   public function createComment(Request $request,Post $post)
   {


    // dd($request->all());
    Comment::create([
        "name"=>$request->name,
        "title"=>$request->title,
        "content"=>$request->content,
        "post_id"=>$post->id,
        "email"=>$request->email
    ]);


    return back()->with("success","نظر شما ساخته شد منتظر ثبت از طرف ادمین باشد");



   }





















    public function destroy(Comment $Comment)
    {
        $Comment->delete();

        return back();
    }
}
