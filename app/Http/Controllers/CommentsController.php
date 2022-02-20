<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    //Create
    public function CView()
    {
        return view('comments.create');
    }
    public function CAction(Request $form)
    {
        $comment = new Comment();

        $comment->user_id = Auth::user()->id;
        $comment->post_id = $form->post_id;
        $comment->content = $form->content;

        $comment->save();

        return redirect()->back();
    }

    //Update - no updating on commentaries

    //Delete
    public function DView()
    {
        return view('comments.delete');
    }
    public function DAction(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('post');
    }
}
