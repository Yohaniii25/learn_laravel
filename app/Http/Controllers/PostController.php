<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //write the logic in here
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('status', 'Something Wrong');
        } else {
            Post::create([
                // logged user details
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'description' => $request->description
            ]);
        }


        // navigate to home page after creating the post
        return redirect(route('posts.all'))->with('status', 'Post created successfully');
    }

    public function show($postId)
    {

        $post = Post::findOrFail($postId);
        return view('posts.show', compact('post'));
    }

    public function edit($postId)
    {
        $post = Post::findOrFail($postId);
        return view('posts.edit', compact('post'));
    }

    public function update($postId, Request $request)
    {
        //check the post is available 
        //all input came as array
        // dd($request->all());
        Post::findOrFail($postId)->update($request->all());

        return redirect(route('posts.all'))->with('status', 'Post Updated');
    }

    public function delete($postId)
    {
        Post::findOrFail($postId)->delete();
        return redirect(route('posts.all'));
    }
}
