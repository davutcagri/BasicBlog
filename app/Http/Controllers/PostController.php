<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //Create a post
    public function create(Request $request)
    {
        $data['title'] = $request->title; //Post title
        $data['body'] = $request->body; //Post content
        $data['user_id'] = Auth::user()->id; //Post author id

        $post = Post::create($data); //Create post

        if (!$post) { //Check if the post exist
            return redirect(route('home')) . with('error', 'Something went wrong!');
        }

        return redirect(route('home')); //Redirect home page
    }

    //Delete post
    public function delete($post_id)
    {
        $post = Post::find($post_id); //Find post

        if(!$post) { //Check if the post exist
            redirect(route('home'))->with('error', 'Post not found!');
        }

        $post->delete(); //Delete post

        return redirect(route('home')); //Redirect home page
    }

    //Update post
    public function update(Request $request, $post_id)
    {
        $data['title'] = $request->title; //New post title
        $data['body'] = $request->body; //New post content

        $post = Post::find($post_id); //Find post
        $post->update($data); //Update post

        return redirect(route('home')); //Redirect home page
    }
}
