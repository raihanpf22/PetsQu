<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Alert;


class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admins = Admin::all();
        return view('sb-admin.table_admin', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.create');

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
        $admin = new Admin;

        $admin -> admin_name = $request->input('admin_name');
        $admin -> email = $request->input('email');
        $admin -> telp = $request->input('telp');

        $password = $request->input('password');
        $admin -> password = Hash::make($password);
        
        $admin->save();
        alert('Success','Admin Account Successfully Created !', 'success');
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($admin_id)
    {
        //
        
        $admin = Admin::where('admin_id', $admin_id)->first();
        return view('admin.edit', compact('admin'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $admin_id)
    {
        //
        
        $admin = Admin::find($admin_id);
        
        $admin -> admin_name = $request->input('admin_name');
        $admin -> email = $request->input('email');
        $admin -> telp = $request->input('telp');
        
        $Newpassword = $request->input('password');
        $admin -> password = Hash::make($Newpassword);

        $admin -> update();

        alert('Success','Update Account Successfully !', 'success');

        return redirect()->back();
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($admin_id)
    {
        //
        
        $admin = Admin::find($admin_id);
        
        $admin -> delete();

        alert('Success','Account Successfully Deleted !', 'success');
        
        return redirect()->back();
    }
}
