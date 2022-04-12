<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Orders;
use App\Models\Post;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class CartController extends Controller
{

    function addData(Request $req){
        $post = Post::all();
        $orders=new Orders();
        $orders->name=$req->name;
//        $order->surname=$req->name;
        $orders->email=$req->email;
        $orders->phone=$req->phone;
        $orders->save();
        return redirect()->back()->with('message', 'IT WORKS!');;
    }

    function show(){
        $data = Post::all();
//        $post = Post::where('id', $id);
        return view('mainPage/cart',['posts'=>$data]);
    }
    function increaseQuantity($id){
        $post = Orders::get($id);
        $qty = $post->qty+1;
        Order::updat($id,$qty);
    }
    function decreaseQuantity($id){
        $post = Orders::get($id);
        $qty = $post->qty-1;
        Order::update($id,$qty);
    }



    public function cart($id)
    {
//          $post = Post::get($id);
       $post = Post::findOrFail($id);
//        // getFileds
        return view('mainPage.cart', compact('post'));
    }
    function down(){
        Schema::dropIfExists('cart');
    }
}
