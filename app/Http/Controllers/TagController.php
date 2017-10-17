<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;

class TagController extends Controller
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
        $tags = Tag::all();
        return view('tags.index')->withTags($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
                'name' => 'required|max:255'
            ));
        $tag = new Tag;
        $tag->name = $request->name;

        $tags = Tag::all();

        foreach ($tags as $key => $value) {
            if($request->name == $value->name){
                Session::flash('error',"Tag dublicated $request->name");
                return redirect()->route('tags.index');
            }
        }

        $tag->save();

        Session::flash('success','Tag saved successfully!');

        return redirect()->route('tags.index');
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
        $tag = Tag::find($id);

        return view('tags.edit')->withTag($tag);
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
        $this->validate($request, array(
                'name' => 'required|max:255'
            ));
        $tag = Tag::find($id);

        $tag->name = $request->name;

        $tags = Tag::all();

        foreach ($tags as $key => $value) {
            if($request->name == $value->name){
                Session::flash('error',"Tag dublicated $request->name");
                return redirect()->route('tags.index');
            }
        }

        $tag->save();

        Session::flash('success','Tag Edited successfully!');

        return redirect()->route('tags.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->posts()->detach($id);

        $tag->delete();

        Session::flash('success', 'Tag deleted successfully!');

        return redirect()->route('tags.index');
    }
}
