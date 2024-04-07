<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\productsModel;
use App\Models\categoriesModel;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function Login_page(Request $request){
        return view('Auth.login');
    }

    public function login_check(Request $request){
       // dd('hai');
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
      
        $email= request('email');
        $password= request('password');

        $checkTheUserExist=User::where('email',$email)->where('password',$password)->first();
        if($checkTheUserExist){

            $userId = $checkTheUserExist->id;
            $name   = $checkTheUserExist->name;
            
            Session::put('userId', $userId);
            Session::put('name', $name);
    
            return redirect('/admin_home');

        }else{
            return redirect()->back()->withErrors([
                'email' => 'Invalid parameters.'
            ]);
        }

    }
}
