<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = User::query()->with('posts','posts.favorite')->get();
        return view('users',compact('data'));
    }
}
