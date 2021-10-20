<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function saveComment(Request $request){
        $user_id = auth()->user()->id;
        $image_id = $request->input('image_id');
        $content = $request->input('content');

        $request->validate([
            'image_id' => ['required', 'integer'],
            'content' => ['required', 'string'],
        ]);


        $comment = new Comment();
        $comment->image_id = $image_id;
        $comment->user_id = $user_id;
        $comment->content = $content;

        $comment->save();

        return redirect()->route('index');
    }

    public function removeComment(Request $request){
        $user_id = auth()->user()->id;
        $image_id = $request->input('image_id');

        $request->validate([
            'image_id' => ['required', 'integer'],
        ]);

        $image_id = $request->input("image_id");
        $comment_id = $request->input("comment_id");

        $delete = Comment::where('id', $comment_id)->where('image_id', $image_id)->delete();

       return redirect()->route('index');
    }
}
