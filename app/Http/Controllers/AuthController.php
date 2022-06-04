<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function post_login(Request $request){
        $validation = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if($validation){
            $auth = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            if($auth) {
                return redirect()->route('index')->with('message', 'User Login Successfully...');
            }else{
                return back()->with('message', 'User Login Failed...');
            }
        }else{
            return back()->withErrors($validation);
        }
    }

    public function register() {
        return view('auth.register');
    }

    public function post_register(Request $request){
        $validation = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required|min:4|max:20|confirmed',
            'image' => 'required',
        ]);
        if($validation){
            $image = $request->image;
            $image_name = uniqid()."_".$image->getClientOriginalName();
            $image->move(public_path('images/profiles'),$image_name);

            $user = new User();
            $user->name = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->image = $image_name;
            $user->save();
            //Important Here | This code below will work after saving to database | Otherwise not working because of auth
            if (Auth::attempt([ 'email' => $request->email, 'password' => $request->password ])) {
                return redirect()->route('index')->with('message', 'User created successfully');
            }
        }else{
            return back()->withErrors($validation);
        }
    }

    public function post_userProfile(Request $request){
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->username;
        $user->email = $request->email;

        if ($request->image) {
            $image = $request->image;
            $image_name = uniqid()."_".$image->getClientOriginalName();
            $image->move(public_path('images/profiles'), $image_name);
            $user->image = $image_name;
        }
        if ($request->old_password && $request->new_password) {
            if (Hash::check($request->old_password, $user->password)) {
                $user->password = Hash::make($request->new_password);
            }else{
                return back()->with('message', 'Old Password is not correct');
            }
        }
        $user->update();
        return back()->with('message', 'User Profile Updated Successfully...');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
