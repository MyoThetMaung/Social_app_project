<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function post(Request $request){
        $validation = $request->validate([
            'title' => 'required',
            'image' => 'required',
            'content' => 'required'
        ]);
        if($validation){
            $post = new Post();
            $post->title = $request->title;
            $post->user_id = Auth::user()->id;
            $post->content = $request->content;

            $image = $request->image;
            $image_name = uniqid()."_".$image->getClientOriginalName();
            $image->move(public_path('images/posts'),$image_name);
            $post->image = $image_name;
            $post->save();
            return redirect()->route('index')->with('message','Post Created Successfully...');
        }else{
            return back()->with('message', 'Something went wrong');
        }
    }

    public function updatePost(Request $request,$id){
        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        if ($request->image) {
            $image = $request->image;
            $image_name = uniqid()."_".$image->getClientOriginalName();
            $image->move(public_path('images/posts'), $image_name);
            $post->image = $image_name;
        }
        $post->update();
        return redirect()->route('index')->with('message','Post Updated Successfully...');
    }


    public function deletePost($id){
        Post::find($id)->delete();
        return redirect()->route('index')->with('message','Post Deleted Successfully...');
    }



}
