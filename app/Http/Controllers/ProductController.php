<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product = Product::all();
        return view('sb-admin.table_product', compact('product'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $product = new Product;

        $product -> name_product = $request->input('name_product');
        $product -> thumbnail = $request->input('thumbnail');
        $product -> category = $request->input('category');
        $product -> weight = $request->input('weight');
        $product -> price = $request->input('price');
        $product -> stock = $request->input('stock');
        $product -> description = $request->input('description');

        if($request->hasfile('img'))
        {
            $file = $request -> file('img');
            $dest = 'uploads/img_products'.'/';
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move($dest, $filename);
            // $file -> move('uploads/img_products/'.$filename);
            $product -> img = $filename;
        } 
        $product->save();
        return redirect()->back()->with('status', 'Product Image Added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($product_id)
    {
        $product = Product::find($product_id);
        // $product = Product::where('product_id','=',$product_id)->first();
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id)
    {
        //
        $product = Product::find($product_id);
        // $product = Product::where('product_id','=',$product_id)->first();
        
        $product -> name_product = $request->input('name_product');
        $product -> thumbnail = $request->input('thumbnail');
        $product -> category = $request->input('category');
        $product -> weight = $request->input('weight');
        $product -> price = $request->input('price');
        $product -> stock = $request->input('stock');
        $product -> description = $request->input('description');
        if($request->hasfile('img'))
        {
            $destination = 'uploads/img_products/'.$product -> img;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('img');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file -> move('uploads/img_products/', $filename);
            $product -> img = $filename;
        }
        $product -> update();
        return redirect()->back()->with('status', 'Product Image Updated Successfully !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        //
        $product = Product::find($product_id);
        $destination = 'uploads/img_products/'.$product->img;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $product -> delete();
        alert('Success','Account Successfully Deleted !', 'success');
        return redirect()->back()->with('status', 'Product Image Deleted Successfully !');
    }
}
