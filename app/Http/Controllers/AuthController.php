<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(Request $request){
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('login');
    }
    public function login_action(Request $request){

        $validator = $request->validate([
            'email'=>'required|email',
            'password' =>'required|min:6'
        ]);

       if(Auth::attempt($validator)){
        return redirect(route('home'));
       }
        //return redirect(route('home'));
    }

    public function register(Request $request){
        if(Auth::user()){
            return redirect(route('home'));
        }
        return view('register');
    }

    public function register_action(Request $request){
        /**
         * Regras para registro
         * - usuario tem que ter um nome
         * -oemail tem que ser unico na tabela users
         * todos os campos são required
         * password tem que ter no minimo 6 caracteres
         */

         $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' =>'required|min:6|confirmed'
         ]);
        $data = $request->only('name','email','password');
         //serve pra criptografar a password do usuario
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        return redirect(route('login'));
    }

    public function logout(){
        Auth::logout();
        return redirect(route('login'));
    }
}
