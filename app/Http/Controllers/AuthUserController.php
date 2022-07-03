<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Seesion;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class AuthUserController extends Controller
{
    //
    public function index(){
        return view('auth.login');
    }

    public function userLogin(Request $request){
        
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');
        
        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()
            ->intended('/main')
            ->withSuccess('Signed in');
        }
        return redirect('login')->with('danger','Login details are not valid !');
    }

    public function main(Request $request){

        
        $product = Product::all();
        if(Auth::check()){

            return view('main', ['product'=>$product]);
        }
        return redirect('login')
        ->with('danger','Login details are not valid !');

    }

    
    public function userRegister(Request $request){
        return view('auth.register');
    }
    
    public function authRegister(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'address'=> 'required|min:3|max:1000',
            'postal_code' => 'required|numeric|min:5',
            'telp'=>'required|numeric|min:12',
            'password' =>'required'
        ]);
        $data = $request->all();
        $check = $this->create($data);
        
        return redirect("main")->with('success', 'Account Created Successfully!');
        
    }
    
    public function create(array $data){
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address'=> $data['address'],
            'postal_code' => $data['postal_code'],
            'telp' => $data['telp'],
            'password' => Hash::make($data['password'])
        ]);
    }
    
    


    public function userLogout(){

        return redirect()->route('beranda');
    }


}
