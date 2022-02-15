<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //C
    public function new(Request $form)
    {
        $post = new Post();

        $post->user_id = Auth::user()->id;
        $post->subject_id = $form->subject;
        $post->title = $form->title;
        $post->content = $form->content;

        $post->save();

        return redirect()->route('home');
    }
    
    //R
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();

        return view('app', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        return view('app', ['post' => $post]);
    }
    
    //U - no updating on posts
    
    //D
    public function delete(Post $post)
    {
        $post->delete();

        return redirect()->route('posts');
    }
}
