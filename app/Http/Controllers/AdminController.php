<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ContactMessage;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function contact_message(){
        $contactMessages = ContactMessage::all();
        return view('admin.contactMessage',compact('contactMessages'));
    }

    public function manage_premium_user(){
        $users = User::all();
        return view('admin.managePremiumUser',compact('users'));
    }

    public function deleteUser($id){
        User::find($id)->delete();
        return back()->with('message', 'User deleted successfully');
    }

    public function editUser($id){
        $user = User::find($id);
        return view('admin.editUser',compact('user'));
    }

    public function updateUser(Request $request, $id){
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'isAdmin' => 'required',
            'isPremium' => 'required',
        ]);
        if($validation){
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->isAdmin = $request->isAdmin;
            $user->isPremium = $request->isPremium;
            $user->update();
            return redirect()->route('admin.manage_premium_user')->with('message','Manage User Successfully...');
        }else{
            return back()->withErrors($validation);
        }
    }
}
