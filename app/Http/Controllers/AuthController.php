<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function signUp(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:15',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        }
        $user = User::query()->create([
            'name'  => $request->get('name'),
            'email'  => $request->get('email'),
            'password'  => Hash::make($request->get('password'))
        ]);
        Auth::loginUsingId($user->id);
        return redirect(route('home'));
    }

    public function signIn(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|max:255',
            'password' => 'required|max:15',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('invalid_credentials',true)->withInput($request->input());
        }
        $data = [
            'email'  => $request->get('email'),
            'password'  => $request->get('password')
        ];
        if (Auth::attempt($data)) {
            return redirect(route('home'));
        }
        return redirect()->back()->with('invalid_credentials',true)->withInput($request->input());
    }

    public function logout(){
        Auth::logout();
        return redirect(route('login'));
    }
}
