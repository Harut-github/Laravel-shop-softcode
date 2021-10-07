<?php

namespace App\Http\Controllers\Admin;
use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('general_admin.comments.index', compact('comments'));
    }

    public function destroy($id)
    {
     $coment = Comment::find($id);
     $coment->delete();
     return redirect('/general_admin/comments');
    }
}
