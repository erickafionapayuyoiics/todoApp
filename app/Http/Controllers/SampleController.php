<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function message()
    {
        $posts = Post::all();

        return PostResource::collection($posts);
    }
}
