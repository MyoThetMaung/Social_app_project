<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    public function index() {
        $posts = Post::latest()->paginate(3);
        return view('index',compact('posts'));
    }

    public function createPost(){
        return view('user.create');
    }

    public function userProfile(){
        return view('user.userProfile');
    }


    public function contactUs(){
        return view('user.contactUs');
    }

    public function showPostById($id){
        $post = Post::find($id);
        return view('user.showPost',compact('post'));
    }

    public function editPost($id){
        $post = Post::find($id);
        return view('user.editPost',compact('post'));
    }




}
