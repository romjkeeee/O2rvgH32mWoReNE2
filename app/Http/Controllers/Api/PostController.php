<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Post;
use Illuminate\Http\Request;

/**
 * @group Posts
 *
 * APIs for
 */
class PostController extends Controller
{
    /**
     * List posts
     *
     * @queryParam user_id integer id автора
     * @queryParam category_id integer id категории
     * @response 200
     */
    public function index(Request $request)
    {
        return response(Post::query()->select(['id', 'title', 'image', 'user_id'])->when($request->user_id, function ($q, $user_id) {
            return $q->where('user_id', $user_id);
        })->when($request->category_id, function ($q, $category_id) {
            return $q->where('category_id', $category_id);
        })->with('author')->paginate(10));
    }
    /**
     * Show post
     *
     * @response 200
     */
    public function show(Post $post)
    {
        return response($post);
    }
}
