<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArchiveCategoryController extends Controller
{
    public function index(Request $request)
    {
        $searchQuery=$request->query("title");
        if($searchQuery)
        {
           $posts=Post::where("title","LIKE","%{$searchQuery}%")->paginate(2);
        }
        
        $tags=Tag::all();
        $lastesNews=DB::table('posts')->latest()->get();

        return view("theme.CategoryArchive",compact("posts","tags","lastesNews"));
    }
}
