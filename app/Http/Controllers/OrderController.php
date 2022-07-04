<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    //
    public function index(){
        $order = Order::all();
        return view('sb-admin.table_order', compact('order'));
    }
}
