<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use App\Category;
use App\Tag;
use Purifier;
use Image;
use Storage;

class PostController extends Controller
{   
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a var and store in it
        $posts = Post::orderBy('id','desc')->paginate(5);

        //return view and pass in above var
        return view('post.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //ValidateBody the data
        $this->validate($request, array(
                'title' => 'required|max:255',
                'body' => 'required',
                'category_id' => 'required|integer',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'featured_image' => 'sometimes|image'
            ));

        //store the data

        $post = new Post;

        $post->title = $request->title;
        $post->body = Purifier::clean($request->body);
        $post->category_id = $request->category_id;
        $post->slug = $request->slug;
        
        if ($request->hasFile('featured_image')) {
          $image = $request->file('featured_image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('images/' . $filename);
          Image::make($image)->resize(800, 400)->save($location);
          $post->image = $filename;
        }

        $post->save();

        $post->tags()->sync($request->tags, false);

        Session::flash('success', 'The blog post was successfully saved!');

        //redirect to another page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $post = Post::find($id);
        
        $category = Category::find($post->category_id);

        // echo "<script>alert($post->category_id)</script>";

        if(!isset($category)){

            $categories = Category::all();
            $cats = [];

            foreach ($categories as $key => $category) {
                $cats[$category->id] = $category->name;
            }
            $tags = Tag::all();
            $tags2 = array();

            foreach ($tags as $key => $tag) {
                $tags2[$tag->id] = $tag->name;
            }
            //return the var in view
            Session::flash('error',"Category Deleted of this post please assign another.");
            return view('post.edit')->withPost($post)->withCats($cats)->withTags($tags2);
        }else{
            return view('post.show')->withPost($post);    
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Find the post in the DB and store in var

        $post = Post::find($id);
        $categories = Category::all();
        $cats = [];

        foreach ($categories as $key => $category) {
            $cats[$category->id] = $category->name;
        }
        $tags = Tag::all();
        $tags2 = array();

        foreach ($tags as $key => $tag) {
            $tags2[$tag->id] = $tag->name;
        }
        //return the var in view
        return view('post.edit')->withPost($post)->withCats($cats)->withTags($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request T $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validate data
        $post = Post::find($id);

        $this->validate($request, array(
                'title' => 'required|max:255',
                'slug' => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
                'category_id' => 'required|integer',
                'body' => 'required',
                'featured_image' => 'sometimes|image'
            ));
        

        //Save the data

        $post->title = $request->input('title');
        $post->body = Purifier::clean($request->input('body'));
        $post->category_id = $request->input('category_id');
        $post->slug = $request->input('slug');

        if ($request->hasFile('featured_image')) {

            //Add new photo
          $image = $request->file('featured_image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('images/' . $filename);
          Image::make($image)->resize(800, 400)->save($location);
          $oldFilename = $post->image;

            //Update database
          $post->image = $filename;

            //Delete old photo
          Storage::delete($oldFilename);

        }

        $post->save();
        if(isset($request->tags)){
        $post->tags()->sync($request->tags, true);
        }else{
           $post->tags()->sync(array()); 
        }

        //set the flash success message
        Session::flash('success', 'This post is saved Sucessfully');

        //redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        Storage::delete($post->image);

        $post->delete();

        Session::flash('success', "Post was $post->title deleted Sucessfully!!");

        return redirect()->route('posts.index');
    }
}
