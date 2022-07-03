<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Alert;

class CartController extends Controller
{
    //
    public function add_cart(Request $request){
        
       
        $id = $request->product_id;
        $product = Product::where('product_id',$id)->first();
        $user = User::where('email', auth()->user()->email)->first();

        $order = new Order;

        $order -> order_user_id = auth()->user()->user_id;
        $order -> order_product_id = $product->product_id;
        $order -> order_name_product = $product->name_product;
        $order -> quantity = 2;
        $order -> ammount = ($product->price)*2;
        $order -> order_address = $user->address;
        $order -> order_email = $user->email;
        $order -> order_status = "Keranjang";
        
        $order -> save();

        alert('Success','Added Product To cart !', 'success');
        return redirect()
        ->back();
        
        
    }

    public function cart(Request $request){

        $id = $request;
        $order = Order::where('order_id', $request)->first();
        
    }
}
