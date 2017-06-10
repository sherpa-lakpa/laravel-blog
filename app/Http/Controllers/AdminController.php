<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Comment;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::count();
        $category = Category::count();
        $tag = Tag::count();
        $comment = Comment::count();
        $user = User::count();
        return view('admins.index')->withPost($post)->withCategory($category)->withTag($tag)->withComment($comment)->withUser($user);
    }
}
