<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class BlogController extends Controller
{
	public function getIndex(){
		$posts = Post::orderBy('id','desc')->paginate(5);

    	return view('blog.index')->withPosts($posts);
    }

    public function getSingle($slug){

    	$post = Post::where('slug', '=', $slug)->first();
    	$comments = Comment::all();

    	return view('blog.single')->withPost($post)->withComments($comments);
    }
}
