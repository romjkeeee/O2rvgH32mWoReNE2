<?php

namespace App\Http\Controllers\Api;

use App\FavoritePost;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddToFavoriteRequest;
use Illuminate\Http\Request;

/**
 * @group Favorite Posts
 *
 * APIs for
 */
class FavoritePostController extends Controller
{
    /**
     * Favorite posts list
     * @authenticated required
     *
     * @response 200
     */
    public function index()
    {
        return response(auth()->user()->favorite()->get());
    }

    /**
     * Add to Favorite
     * @bodyParam post_id integer id of post
     * @authenticated required
     * @response 201
     */
    public function store(AddToFavoriteRequest $request)
    {
        return response(auth()->user()->favorite()->create($request->validated()), 201);
    }

    /**
     * Remove from Favorite
     *
     * @response 204
     */
    public function destroy(FavoritePost $favoritePost)
    {
        if ($favoritePost->delete())
        {
            return response(null, 204);
        }
    }
}
