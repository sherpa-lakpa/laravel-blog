<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Page;
use Mail;
use Session;
use Purifier;
use Image;
use Storage;

class PagesController extends Controller {
	/**
     * Create a new controller instance.
     *
     * @return void
     */
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('App\Http\Middleware\UserMiddleware');
    }

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('admins.pages.pages')->withPages($pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.pages.create_pages');
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
                'name' => 'required|max:255',
                'body' => 'required'
            ));

        //store the data

        $page = new Page;

        $page->name = $request->name;
        $page->body = Purifier::clean($request->body);

        $page->save();

        Session::flash('success', 'The page was successfully saved!');

        //redirect to another page
        return redirect()->route('pages.index', $page->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Page::find($id);
        return view('admins.pages.show_page')->withPage($page);
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

        $page = Page::find($id);

        //return the var in view
        return view('admins.pages.edit_page')->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validate data
        $page = Page::find($id);

        $this->validate($request, array(
                'name' => 'required|max:255',
                'body' => 'required',
                'image' => 'sometimes|image'
            ));
        

        //Save the data

        $page->name = $request->input('name');
        $page->body = Purifier::clean($request->input('body'));

        if ($request->hasFile('image')) {
            //Add new photo
          $image = $request->file('image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('images/' . $filename);
          Image::make($image)->save($location);
          // Image::make($image)->resize(800, 400)->save($location);
          $oldFilename = $page->image;

            //Update database
          $page->image = $filename;

            //Delete old photo
          Storage::delete($oldFilename);

        }

        $page->save();

        //set the flash success message
        Session::flash('success', 'This page is saved Sucessfully');

        //redirect with flash data to posts.show
        return redirect()->route('pages.show', $page->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        Storage::delete($page->image);

        $page->delete();

        Session::flash('success', "Post was $page->name deleted Sucessfully!!");

        return redirect()->route('pages.index');
    }


}