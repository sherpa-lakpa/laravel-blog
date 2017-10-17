<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Category;
use Session;
use Redirect;

class BlogController extends Controller
{
    public $post;
	public function getIndex(){
		// $posts = Post::orderBy('id','desc')->paginate(5);
		$posts = Post::orderBy('id','desc')->paginate();

    	return view('blog.index')->withPosts($posts);
    }

    public function getSingle($slug){


        $post = Post::where('slug', '=', $slug)->first();

        $postCount = $post['views'];
        $post->views = $postCount+1;
        $post->save();

        $category_id = $post['category_id'];

        $category = Category::find($category_id);
        $categoryCount = $category['views'];
        $category->views = $categoryCount+1;
        $category->save();


        // $posts = Post::orderBy('created_at', 'desc')->limit(8)->get();
        $posts = Post::orderBy('views', 'desc')->get();

        $comments = Comment::orderBy('created_at', 'desc')->limit(5)->get();

        $categories = Category::orderBy('views', 'desc')->get();


        return view('blog.single')->withPost($post)->withComments($comments)->withCategories($categories)->withPosts($posts);
        
    }

    public function getCategory($category){

        $category = Category::where('name', '=', $category)->first();

        $posts = Post::where('category_id', $category->id)->get();

    	return view('blog.category')->withPosts($posts);
    }
       /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function comment_destory($id)
    {
        $comment = Comment::find($id);

        $comment->delete();

        Session::flash('Comment_success', 'Comment deleted successfully!');

        return Redirect::back();
    }
}
