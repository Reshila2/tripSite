<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use App\Models\Post;
use App\Models\Category;

//use App\Http\Controllers\Admin\Category;
use Illuminate\Http\Request;

class HomeController extends Controller {
    public function index($categoryId =0){
        $posts_counts = Post::all()->count();
        $categories_count = Category::all()->count();
        return view('admin.home.index',[
            'posts_counts' => $posts_counts,
            'categories_count' => $categories_count,
        ]);


//        return view('admin.home.index',[
//            'posts_count' => $posts_count
//        ]);
    }
//    public function show2(){
//        return view('mainPage.index');
//    }
}
