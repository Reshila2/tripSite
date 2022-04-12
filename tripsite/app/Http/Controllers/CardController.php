<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class CardController extends Controller
{
    function show(){
        $data = Post::all();
//        $post = Post::where('id', $id);
        return view('mainPage/show',['posts'=>$data]);
    }


    public function postCategory($id)
    {
        $post = Post::where('id', $id)->get();
        $post = Post::findOrFail($id);
        return view('mainPage.show', compact('post'));
    }


}
