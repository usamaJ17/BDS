<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donner;

class DonnerContorller extends Controller
{
    public function __construct(){
        $this->middleware('admin', ['except' => ['store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'name' => 'required',
            'reg_num' => 'required',
            'email' => 'email',
            'phone' => 'required',
            'group' => 'required'
        ]);
        $donner = new Donner();
        $donner->name = $request->name;
        $donner->reg_num = $request->reg_num;
        $donner->email = $request->email;
        $donner->phone = $request->phone;
        $donner->group = $request->group;
        $donner->location = $request->location;
        $donner->history = $request->history;
        $donner->date = $request->date;
        $donner->team = $request->team;
        $donner->save();
        return view('messages.success_save');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "show -- ". $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donner=Donner::find($id);
        if(!is_null($donner)){
            $title='Update Donner';
            $route='donner.update';
            $data=compact('donner','title','route');
            return view('edit')->with($data);
        }
        else{
            echo 'ID wrong';
        }
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
        $request->validate([
            'name' => 'required',
            'reg_num' => 'required',
            'email' => 'email',
            'phone' => 'required',
            'group' => 'required'
        ]);
        $donner =Donner::find($id);
        $donner->name = $request->name;
        $donner->reg_num = $request->reg_num;
        $donner->email = $request->email;
        $donner->phone = $request->phone;
        $donner->group = $request->group;
        $donner->location = $request->location;
        $donner->history = $request->history;
        $donner->date = $request->date;
        $donner->team = $request->team;
        $donner->save();
        return view('messages.success_Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donner=Donner::find($id);
        if(!is_null($donner)){
            $donner->delete();
        }
        return redirect()->back();
    }
}
