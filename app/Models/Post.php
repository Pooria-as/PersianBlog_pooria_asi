<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    protected $fillable=['category_id',"user_id","title","description","content","image","slug"];


/**
 * Get the user associated with the Post
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasOne
 */

public function user()
{
    return $this->belongsTo(User::class);
}
 
public function category()
{
    return $this->belongsTo(Category::class);
}

public function tags()
{
    return $this->belongsToMany(Tag::class);
}

public function hasTag($tag_id)
{
return in_array($tag_id,$this->tags->pluck('id')->toArray());
}


public function comments()
{
    return $this->hasMany(Comment::class);
}

public function getRouteKeyName()
{
    return "slug";
}















}
