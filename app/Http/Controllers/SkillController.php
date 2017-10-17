<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use Session;

class SkillController extends Controller
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
        $skills = Skill::all();
        return view('skills.index')->withSkills($skills);
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
        $this->validate($request, array(
                'name' => 'required|max:255'
            ));
        $skill = new Skill;
        $skill->name = $request->name;

        $skills = Skill::all();

        foreach ($skills as $key => $value) {
            if($request->name == $value->name){
                Session::flash('error',"Skill dublicated $request->name");
                return redirect()->route('skills.index');
            }
        }

        $skill->save();

        Session::flash('success','Skill saved successfully!');

        return redirect()->route('skills.index');
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
        $skill = Skill::find($id);

        return view('skills.edit')->withSkill($skill);
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
        $skill = Skill::find($id);

        $skill->name = $request->name;

        $skills = Skill::all();

        foreach ($skills as $key => $value) {
            if($request->name == $value->name){
                Session::flash('error',"Skill dublicated $request->name");
                return redirect()->route('skills.index');
            }
        }
        
        $skill->save();

        Session::flash('success','Skill Edited successfully!');

        return redirect()->route('skills.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skill = Skill::find($id);
        $skill->users()->detach($id);

        $skill->delete();

        Session::flash('success', 'Skill deleted successfully!');

        return redirect()->route('skills.index');
    }
}
