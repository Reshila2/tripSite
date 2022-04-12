<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    public function posts()
    {
        return $this->hasMany('App\Post', 'cat_id');
    }
    public function postCategory($cat_id)
    {
        $posts = Post::where('category_id', $cat_id)->get();

        return view('welcome', compact('posts'));
    }
}
