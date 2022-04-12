<?php

namespace App\Http\Controllers;
use App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($categoryId =0)
    {
        $lastPosts = Post::all();
        $categories = Category::all();

        if($categoryId){
            $lastPosts->where('cat_id',$categoryId);
        }


        return view('mainPage.index',[
            'posts' =>$lastPosts,
            'categories'=>$categories
        ]);
        return view('mainPage.index');
//        return view('mainPage.item1');
    }
}
