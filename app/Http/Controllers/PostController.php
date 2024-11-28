<?php

namespace App\Http\Controllers;

use App\Http\Resources\SinglePostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function addNewPost (Request $request) {
        $validated = Validator::make($request->all(), [
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        if ($validated->fails()) {
            return response()->json($validated->errors(), 403);
        }

        try {
            $post = new Post();
            $post->title = $request->title;
            $post->content = $request->content;
            $post->user_id = auth()->user()->id;
            $post->save();
            return response()->json([
                'message' => 'Post added success',
                'post' => $post
            ], 201);
        } catch (\Exception $ex) {
            return response()->json([
                'error' => $ex->getMessage()
            ], 403);
        }

    }

    public function editPost (Request $request) {
        $validated = Validator::make($request->all(), [
            'title' => 'required|string',
            'content' => 'required|string',
            'post_id' => 'required|integer'
        ]);

        if ($validated->fails()) {
            return response()->json($validated->errors(), 403);
        }

        try {
            $post_data = Post::find($request->post_id);
            $post_data->update([
                'title' => $request->title,
                'content' => $request->content,
            ]);
            return response()->json([
                'message' => 'Post updated success',
                'post' => $post_data
            ], 201);
        } catch (\Exception $ex) {
            return response()->json([
                'error' => $ex->getMessage()
            ], 403);
        }

    }

    public function getAllPosts () {
        try {
            $posts = Post::all();
            return response()->json([
                'posts' => $posts
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => $exception->getMessage()
            ], 403);
        }
    }

    public function singlePost ($post_id) {
        try {
            // $post = Post::with('user', 'comment', 'like')->findOrFail($post_id);
            $post = Post::find($post_id);
            $post_data = new SinglePostResource($post);
            return response()->json([
                'post' => $post_data
            ], 200);
        } catch (\Exception $ex) {
            return response()->json([
                'error' => $ex->getMessage()
            ], 403);
        }
    }

    public function deletePost ($post_id) {
        try {
            $post = Post::findOrFail($post_id);
            $post->delete();
            return response()->json([
                'message' => 'post deleted successfully'
            ], 200);
        } catch (\Exception $ex) {
            return response()->json([
                'error' => $ex->getMessage()
            ], 403);
        }
    }

}
