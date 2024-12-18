<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\StorePostRequest;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }

    public function create()
    {

    }

    public function getPosts()
    {
        try {
            $posts = Post::all();
            return response()->json([
                'posts' => $posts,
                'message' => 'Posts retrived successfully',
                'status' => 200,
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function store(StorePostRequest $request)
    {
        try {
            $attributes = $request->validated();
            $attributes['user_id'] = Auth::user()->id;
            $post = Post::create($attributes);

            return response()->json([
                'post' => $post,
                'message' => 'Post created successfully',
                'status' => 201,
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
