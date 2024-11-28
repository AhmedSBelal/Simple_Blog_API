<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function postComment (Request $request) {
        $validated = Validator::make($request->all(), [
            'post_id' => 'required|integer|exists:posts,id',
            'content' => 'required|string'
        ]);

        if ($validated->fails()) {
            return response()->json($validated->errors(), 403);
        }

        try {
            $comment = new Comment();
            $comment->user_id = auth()->user()->id;
            $comment->post_id = $request->post_id;
            $comment->content = $request->content;
            $comment->save();
            return response()->json([
                'message' => 'Comment added successfully'
            ], 201);
        } catch (\Exception $ex) {
            return response()->json([
                'error' => $ex->getMessage()
            ],403);
        }

    }
}
