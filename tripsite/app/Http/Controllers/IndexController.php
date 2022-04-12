<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use App\Http\Controllers\Controller\CategoryController;
;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function categoryPost($cat_id=0){
        $lastPosts = Post::latest();
        $categories = Category::get();
//        dump($cat_id);

        if($cat_id){
            $lastPosts->where('cat_id',$cat_id);
        }
        return view('mainPage.index',[
            'posts'=>$lastPosts->get(),
            'categories'=>$categories,
            'cat_id'=>$cat_id
        ]);
    }
}
