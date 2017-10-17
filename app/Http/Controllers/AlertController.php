<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alert;
use Session;

class AlertController extends Controller
{
    /**
     * Forwards a listing array.
     *
     * @return array of Alerts
     */
    public function messages(){
        $alerts = Alert::orderBy('id', 'desc')
                ->latest()
                ->first()
                ->limit(5)
                ->get();
        return $alerts;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alerts = Alert::orderBy('id','desc')->paginate(3);
        return view('alerts.index')->withAlerts($alerts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alerts = Alert::all();

        return view('alerts.create')->withTags($alerts);
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
                'message' => 'required',
                'type' => 'required',
            ));

        //store the data

        $contact = new Alert;

        $contact->title = $request->title;
        $contact->message = $request->message;
        $contact->type = $request->type;

        $contact->save();

        Session::flash('success', 'Your Alert has been created successfully!');

        //redirect to another page
        return redirect()->route('alerts.index', $contact->id);
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
        $alert = Alert::find($id);

        $alert->delete();

        Session::flash('success', "Alert - $alert->title deleted Sucessfully!!");

        return redirect()->route('alerts.index');
    }
}
