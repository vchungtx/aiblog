<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    //
    public function store(Request $request)
    {
        Log::info("store comment");
        // Validate the request data
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required',
        ]);
        Log::info("start store comment");
        // Create a new comment
        $comment = new Comment();
        $comment->post_id = $request->input('post_id');
        $comment->reply_to = $request->input('reply_comment_id');
        $comment->user_id = auth()->user()->id; // Set the user ID based on your authentication system
        $comment->content = $request->input('content');
        $comment->created_at = now();
        $comment->save();
        Log::info("end store comment");
        // Redirect back to the post or wherever you want
        return redirect()->back()->with('success', 'Comment added successfully');
    }
}
