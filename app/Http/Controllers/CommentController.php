<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index($id)
    {
        $comments = Comment::where('post_id' , $id)->paginate(10);
        return view('Comment.Comments', compact('comments'));

    }
    public function delete($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->route('allcommentsPost' , $comment->post->id);
    }

}
