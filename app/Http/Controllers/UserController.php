<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Skill;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admins.pages.users')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skills = Skill::all();
        return view('users.create')->withSkills($skills);
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
                'email' => 'required|email',
                'password' => 'required',
            ));

        //store the data

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        Session::flash('success', 'User was successfully created!');

        //redirect to another page
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        // echo "<script>alert($post->category_id)</script>";
        return view('admins.pages.profile')->withUser($user);    
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

        $user = User::find($id);
    
        $skills = Skill::all();
        $skills2 = array();

        foreach ($skills as $key => $skill) {
            $skills2[$skill->id] = $skill->name;
        }

        //return the var in view
        return view('users.edit')->withUser($user)->withSkills2($skills2);
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
        $user = User::find($id);

        $this->validate($request, array(
                'name' => 'required|max:255',
                'email' => 'required|email|max:255',
                'admin' => 'required',
                'bio' => 'required',
                'birth' => 'required',
                'gender' => 'required',
            ));
        
        //Save the data

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->bio = $request->input('bio');
        $user->home = $request->input('home');
        $user->admin = $request->input('admin');
        $user->birth = $request->input('birth');
        $user->gender = $request->input('gender');

        $user->save();

        if(isset($request->skills)){
            $user->skills()->sync($request->skills, true);
        }else{
           $user->skills()->sync(array()); 
        }

        //set the flash success message
        Session::flash('success', 'User is edited Sucessfully');

        //redirect with flash data to posts.show
        return redirect()->route('users.index');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->skills()->detach();

        $user->delete();

        Session::flash('success', "User - $user->name deleted Sucessfully!!");

        return redirect()->route('users.index');
    }

    public function updateUser(Request $request)
    {  
        $user = User::find($request->id);

        $column = $request->column;
        $user->$column = $request->editval;
        $blog->save();
        return response()->json($blog);
    }
}
