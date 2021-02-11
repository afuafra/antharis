<?php

namespace App\Http\Controllers;

use App\Models\devicesites;
use App\Models\Fcab;
use App\Models\FcabInterface;
use Illuminate\Http\Request;

class FcabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fcab=Fcab::orderBy("id","desc")->with('devicesites')->paginate();
        $devicesites = devicesites::all();



        return view("fcab.index")->with("fcab_list",$fcab)->with ("devicesites_list",$devicesites) ;
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
        $res=new \App\Models\Fcab;
        $res->fcab_no=$request->input("fcab_no");
        $res->fcab_device_id=$request->input("fcab_device_id");
        $res->device_address=$request->input("device_address");
        $res->device_status=$request->input("device_status");
        $res->devicesites_id=$request->input("devicesites_id");
        $res->save();

        $request->session()->flash("msg","New Service Added");
        return redirect("fcab");
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
}
