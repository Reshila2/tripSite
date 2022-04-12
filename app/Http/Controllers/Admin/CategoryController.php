<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($id){
        $categories = Category::where('id', $id)->first();

    }
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();

        return view('admin.category.index', [
            'categories' => $categories
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_category = new Category();
        $new_category->title = $request->title;
        $new_category->save();

        return redirect()->back()->withSuccess('Категория была успешна добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(){
//        $data = Category::all();
            return Category::all();
//          return view('mainPage/index');
//        return view('mainPage/index',['categories'=>$data]);
//        return view('admin.post.show', [
//            'categories' => $categories,
//            'post' => $post,
//        ]);
//        return view('mainPage/item',['posts'=>$data]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',[
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->title = $request ->title;
        $category->save();

        return redirect()->back()->withSuccess('Категория была успешна обновлена');

    }

    public function postCategory($cat_id)
    {
        $posts = Post::where('category_id', $cat_id)->get();
        return view('front.posts.category', compact('posts'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
//
        $posts = Post::where('cat_id', $category->id)->count();

        if($posts > 0){
            return redirect()->back()->withSuccess('Удалите посты связанные с категорией');
    //            return redirect::to('admin/category/index')
    //                ->with('message', 'Something went wrong');
        }
        else{
            $category->delete();
            return redirect()->back()->withSuccess('Категория была успешна удалена');
        }
//        }
    }
}
