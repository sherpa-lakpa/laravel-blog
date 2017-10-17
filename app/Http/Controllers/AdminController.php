<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Comment;
use App\Tag;
use App\User;
use App\Contact;
use App\Alert;
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

    public function messages(){
        $messages = Contact::orderBy('id', 'desc')
                ->limit(3)
                ->get();
        return $messages;
    }

    public function alerts(){
        $alerts = Alert::orderBy('id', 'desc')
                ->limit(3)
                ->get();
        return $alerts;
    }

    public function index()
    {
        $post = Post::count();
        $category = Category::count();
        $tag = Tag::count();
        $comment = Comment::count();
        $user = User::count();
        $messages = $this->messages();
        $notification = Alert::orderBy('id', 'desc')
                ->limit(3)
                ->get();
        return view('admins.index')->withPost($post)->withCategory($category)->withTag($tag)->withComment($comment)->withUser($user)->withNotification($notification);
    }
}
