<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Session;
use App\Post;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Test for elastic search 
    /*public function index()
    {
        return view('home');
    }*/

    public function index()
    {
        $contacts = Contact::orderBy('id','desc')->paginate(5);
        return view('messages.index')->withContacts($contacts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                'email' => 'required|email|max:255',
                'message' => 'required',
            ));

        //store the data

        $contact = new Contact;

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;

        $contact->save();

        Session::flash('success', 'Your message has been successfully!');

        //redirect to another page
        return redirect()->action('BrowseController@getContact');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /*
    Search function for elastic search
    */
  /*  public function search()
    {
        $search = \Request::get('data'); //<-- we use global request to get the param of URI

        $posts = Post::where('title','like','%'.$search.'%')
            ->orderBy('title')
            ->paginate(10);

        return view('search')->withPosts($posts);
    }*/
}
