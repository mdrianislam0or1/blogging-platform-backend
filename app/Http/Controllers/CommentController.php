<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Blog $blog)
    {
        $request->validate([
            'text' => 'required',
            'author' => 'required',
        ]);

        $comment = $blog->comments()->create([
            'text' => $request->text,
            'author' => $request->author,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Comment added successfully.',
            'data' => $comment,
        ]);
    }

    public function update(Request $request, Blog $blog, Comment $comment)
    {
        $request->validate([
            'text' => 'required',
            'author' => 'required',
        ]);

        $comment->update([
            'text' => $request->text,
            'author' => $request->author,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Comment updated successfully.',
            'data' => $comment,
        ]);
    }

    public function destroy(Blog $blog, Comment $comment)
    {
        $comment->delete();

        return response()->json([
            'status' => true,
            'message' => 'Comment deleted successfully.',
        ]);
    }
}
