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
        $quantity = $request->quantity;
        $product = Product::where('product_id',$id)->first();
        $user = User::where('email', auth()->user()->email)->first();

        $order = new Order;

        $order -> order_user_id = auth()->user()->user_id;
        $order -> order_product_id = $product->product_id;
        $order -> order_name_product = $product->name_product;
        $order -> order_img = $product->img;
        $order -> quantity = $quantity;
        $order -> ammount = ($product->price)*$quantity;
        $order -> order_address = $user->address;
        $order -> order_email = $user->email;
        $order -> order_status = "Keranjang";
        
        $order -> save();

        alert('Success','Added Product To cart !', 'success');
        return redirect()
        ->back();
        
        
    }

    public function cart(Request $request){

        $id_user = User::where('email', auth()->user()->email)->first() ;
        $order = Order::where('order_user_id', $id_user->user_id)->where('order_status', 'Keranjang')->get();
        $total_price = 0;
        
        
        foreach($order as $item){
            $total_price = $total_price + $item->ammount;
        }

        $total_item = count($order);
        return view('cart', ['orders'=>$order, 'total_item'=>$total_item, 'total_price'=>$total_price]);
        
    }

    public function destroy($order_id)
    {
        $order = Order::find($order_id);
        
        $order ->delete();

        alert('Success','Successfully Remove Item !', 'success');

        return redirect()->back();
    }
}
