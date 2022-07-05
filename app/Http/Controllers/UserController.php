<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Alert;

class UserController extends Controller
{
    //
    public function index(){
        
        $users = User::get();
        

        return view('sb-admin.table_user', ['users'=>$users]);
    }


    public function edit($user_id)
    {
        $user = user::find($user_id);
        return view('users.edit', compact('user'));
    }
    public function update(Request $request, $user_id)
    {
        //
        $user = User::find($user_id);
        
        $user -> name = $request->input('name');
        $user -> email = $request->input('email');
        $user -> address = $request->input('address');
        $user -> postal_code = $request->input('postal_code');
        $user -> telp = $request->input('telp');

        $NewPassword = $request->input('password');
        $user -> password = Hash::make($NewPassword);
        
        $user -> update();

        alert('Success','Update Account Successfully !', 'success');

        return redirect()->back()->with('status', 'User Updated Successfully !');
    }

    public function destroy($user_id)
    {
        //
        $user = User::find($user_id);
        
        $user -> delete();

        alert('Success','Account Successfully Deleted !', 'success');
        
        return redirect()->back()->with('status', 'User Account Deleted Successfully !');
    }
}
