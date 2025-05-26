<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


class RegisterController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'password' => ['required', 'min:5', 'max:255'],
        ]);

        $validate['password'] = Hash::make($validate['password']);
        User::create($validate);
        session()->flash('success', 'Register Success, Please Login!');
        return redirect('/');
    }
}