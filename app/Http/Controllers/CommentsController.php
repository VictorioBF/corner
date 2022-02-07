<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    //C
    public function insert(Request $form, $url)
    {
        $comment = new Comment();

        
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $form->occult;
        $comment->content = $form->content;

        $comment->save();

        return redirect()->route('home');
    }

    //R
    public function index()
    {
        $comments = Comment::orderBy('id', 'desc')->get();

        return view('comments.index', ['comments' => $comments]);
    }

    public function show(Comment $comment)
    {
        return view('comments.show', ['comment' => $comment]);
    }

    //U - no updating on commentaries

    //D
    public function delete(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('comments');
    }
}
