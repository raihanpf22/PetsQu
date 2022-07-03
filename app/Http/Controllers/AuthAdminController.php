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
        
        if (Auth::guard('admin')->attempt(['email'=> $request->email, 'password'=> $request->password])){
    
            $request->session()->regenerate();
            
            return redirect()->route('dashboard');
        }
        return redirect("admin");
    }

    

    public function dashboard(Request $request){
        $admin_name = Admin::with('admin')->get('admin_name');
        $email = Admin::with('admin')->get('email');
        

        return view('sb-admin.dashboard', ['admin_name'=>$admin_name, 'email'=>$email]);
    }

    public function adminLogout(Request $request){
        $request->session()->flush();
        Auth::guard('admin')->logout();
        return view('admin');
    }
}
