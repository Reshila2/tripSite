<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Cart;
use Illuminate\Http\Request;
use Session;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();

        return view('admin.post.index', [
            'posts' => $posts
        ]);
        $posts = DB::select('select * from posts');
        return view('stud_view',['users'=>$users]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::orderBy('created_at','DESC')->get();

        $categories = Category::orderBy('created_at', 'DESC')->get();

        return view('admin.post.create', [
            'posts'=>$posts,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->img = $request->img;
        $post->text = $request->text;
        $post->subtitle = $request->subtitle;
        $post->cat_id = $request->cat_id;

        $post->price = $request->price;
        $post->productDescription = $request->productDescription;

        $post->save();

        return redirect()->back()->withSuccess('Статья была успешно добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    function show(){
//
        $data = Post::all();
        $data1 = Category::all();
        return view('mainPage/index',['posts'=>$data],['categories'=>$data1]);
        return view('mainPage/show/' . $post['post_id'],['posts'=>$data]);


    }
//
//
//    function show2(){
//        $post = Post::all();
//        return view('mainPage/cart/' . $post['price'],['posts'=>$data]);
//
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();

        return view('admin.post.edit', [
            'categories' => $categories,
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request->title;
        $post->img = $request->img;
        $post->text = $request->text;
        $post->cat_id = $request->cat_id;
        $post->price = $request->price;
        $post->save();

        return redirect()->back()->withSuccess('Статья была успешно обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->withSuccess('Статья была успешно удалена!');
    }
//        $post = Post::where('id', $id)->get();
//        $post = Post::findOrFail($id);
    public function getAddToCart(Request $request,$id)
    {

        $post = Post::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($post, $post->id);
//        dd($request->session()->get('cart'));
        $request->session()->put('cart', $cart);
        return redirect()->route('mainPage.cart', compact('post'));
    }

    public function getCart(){
        if(!Session::has('cart')){
            return view('mainPage.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('mainPage.cart',['posts'=>$cart->items, 'totalPrice'=>$cart->totalPrice]);
    }
    public function getCheckout(){
        if(!Session::has('cart')){
            return view('mainPage.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('mainPage.checkout',['total'=>$total]);
    }

}
