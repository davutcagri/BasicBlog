<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create(Request $request)
    {
        $data['title'] = $request->title;
        $data['body'] = $request->body;
        $data['user_id'] = Auth::user()->id;

        $post = Post::create($data);
        if (!$post) {
            return redirect(route('home')) . with('error', 'Something went wrong!');
        }
        return redirect(route('home'));
    }

    public function delete($post_id)
    {
        $post = Post::find($post_id);
        if(!$post) {
            redirect(route('home'))->with('error', 'Post not found!');
        }
        $post->delete();
        return redirect(route('home'));
    }

    public function update(Request $request, $post_id)
    {
        $data['title'] = $request->title;
        $data['body'] = $request->body;

        $post = Post::find($post_id);
        $post->update($data);
        return redirect(route('home'));
    }
}
