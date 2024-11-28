<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LikeController extends Controller
{
    public function likePost (Request $request) {
        $validated = Validator::make($request->all(), [
            'post_id' => 'required|integer|exists:posts,id',
        ]);

        if ($validated->fails()) {
            return response()->json($validated->errors(), 403);
        }

        try {
            $userLikedPostBefore = Like::where('user_id', auth()->user()->id)
                ->where('post_id', $request->post_id)->first();
            if ($userLikedPostBefore) {
                return response()->json([
                    'message' => "you can't like a post twice"
                ], 403);
            } 
            $like = new Like();
            $like->user_id = auth()->user()->id;
            $like->post_id = $request->post_id;
            $like->save();
            return response()->json([
                'message' => 'Like added successfully'
            ], 201);
        } catch (\Exception $ex) {
            return response()->json([
                'error' => $ex->getMessage()
            ],403);
        }

    }
}
