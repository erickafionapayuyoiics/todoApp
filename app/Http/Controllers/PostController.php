<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function showAll()
    {
        return view('posts.show');
    }

    public function showPost(Post $post)
    {
        return view('posts.showpost', compact('post'));
    }

    public function addPost()
    {
        return view('posts.add');
    }
}
