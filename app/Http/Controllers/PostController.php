<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //write the logic in here
    public function store(Request $request)
    {
        Post::create([
            // logged user details
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'description' => $request->description
        ]);

        // navigate to home page after creating the post
        return back();
    }

    public function show($postId)
    {

        $post = Post::find($postId);
        return view('posts.show', compact('post'));
    }
}
