<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AuthAdminController extends Controller
{
    //
    public function __construct() {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function index(){
        return view('auth.admin');
    }

    public function adminLogin(Request $request){
        
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $email = $request->email;
        $name_admin = Admin::where('email', $email)->first();
        
        if (Auth::guard('admin')->attempt(['email'=> $request->email, 'password'=> $request->password])){
    
            $request->session()->regenerate();
            
            return redirect()->route('dashboard', ['name_admin'=>$name_admin, 'email'=>$email]);
        }
        return redirect("admin");
    }

    

    public function dashboard(Request $request){
        $email = $request->email;
        $admin = Admin::where('email', $email)->first();

        return view('sb-admin.dashboard', ['admins'=>$admin]);
    }

    public function adminLogout(Request $request){
        $request->session()->flush();
        Auth::guard('admin')->logout();
        return view('admin');
    }
}
