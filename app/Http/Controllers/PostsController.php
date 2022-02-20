<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //Create
    public function CView()
    {
        return view('posts.create');
    }
    public function CAction(Request $form)
    {
        $post = new Post();

        $post->user_id = Auth::user()->id;
        $post->subject_id = $form->subject;
        $post->title = $form->title;
        $post->content = $form->content;

        $post->save();

        return redirect()->route('posts.home');
    }
    
    //Read
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();

        $subjects = Subject::orderBy('id', 'desc')->get();

        return view('posts.home', ['page' => 'home', 'posts' => $posts, 'subjects' => $subjects]);
    }

    public function subject(Subject $subject)
    {
        $posts = Post::select("*")->where("subject_id", $subject->id)->get();

        $subjects = Subject::orderBy('id', 'desc')->get();

        return view('posts.home', ['page' => 'home', 'posts' => $posts, 'subjects' => $subjects]);
    }

    public function show(Post $post)
    {
        $comments = $post->comments()->get();
        $user = $post->user()->get();

        return view('posts.show', ['page' => 'home', 'post' => $post,'user'=>$user, 'comments' => $comments]);
    }
    
    //Update - no updating on posts
    
    //Delete
    public function DAction(Post $post)
    {
        $comments = $post->comments()->get();
        foreach($comments as $comment){
            $comment->delete();
        }

        $post->delete();

        return redirect()->route('posts.home');
    }
}
