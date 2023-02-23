<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    public function showAll()
    {
        $posts = Post::all();

        return PostResource::collection($posts);
    }

    public function findPost(Post $post)
    {
        return new PostResource($post);
    }

    public function add(Request $request)
    {
        Post::create(['title' => $request->title, 'content' => $request->content]);

        return response()->json([
            'status' => 200,
            'data' => true,
        ], 200);
    }

    public function update(Post $post, Request $request)
    {
        $post->update(['title' => $request->title, 'content' => $request->content]);

        return response()->json([
            'status' => 200,
            'data' => true,
        ], 200);
    }

    public function delete(Post $post)
    {
        $post->delete();

        return response()->json([
            'status' => 200,
            'data' => true,
        ], 200);
    }
}
