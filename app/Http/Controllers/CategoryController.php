<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

class CategoryController extends Controller
{
    public function __contruct(){
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Display all category
        $categories = Category::all();

        return view('categories.index')->withCategories($categories);

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

        $category = new Category;

        $category->name = $request->name;

        $categories = Category::all();

        foreach ($categories as $key => $value) {
            if($request->name == $value->name){
                Session::flash('error',"Category dublicated $request->name");
                return redirect()->route('categories.index');
            }
        }
        
        $category->save();
        Session::flash('success','New category added successfully');
        return redirect()->route('categories.index');
    
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
        $category = Category::find($id);

        return view('categories.edit')->withCategory($category);
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
        $category = Category::find($id);

        $category->name = $request->name;

        $categories = Category::all();

        foreach ($categories as $key => $value) {
            if($request->name == $value->name){
                Session::flash('error',"Category dublicated $request->name");
                return redirect()->route('categories.index');
            }
        }

        $category->save();

        Session::flash('success','Category Edited successfully!');

        return redirect()->route('categories.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        // $category->posts()->detach();

        $category->delete();

        Session::flash('success', 'Category deleted successfully!');

        return redirect()->route('categories.index');
    }
}
