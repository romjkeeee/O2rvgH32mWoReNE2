<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Post;
use Illuminate\Http\Request;

/**
 * @group User Posts
 *
 * APIs for
 */
class UserPostController extends Controller
{
    /**
     * List of user posts
     *
     * @response 200
     */
    public function index()
    {
        return response(auth()->user()->posts()->get());
    }

    /**
     * Create post
     * @bodyParam title string required
     * @bodyParam text text required
     * @bodyParam category_id string required
     * @bodyParam image image
     *
     */
    public function store(CreatePostRequest $request)
    {
        $post = auth()->user()->posts()->create($request->validated());
        if ($request->file('image'))
        {
            $path = $request->file('image')->store('images');
            $post->update(['image' => env('APP_URL') . $path]);
        }
        return response($post, 201);
    }

    /**
     * Delete post
     *
     * @response 204
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        if ($post->delete())
        {
            return response(null, 204);
        }
    }
}
