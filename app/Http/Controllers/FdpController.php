<?php

namespace App\Http\Controllers;

use App\Models\devicesites;
use App\Models\Fdps;
use Illuminate\Http\Request;

class FdpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fdps=Fdps::orderBy("id","desc")->with('devicesites')->paginate();
        $devicesites = devicesites::all();

//        return $devicesites;

        return view("fdp.index")->with("fdp_list",$fdps)->with ("devicesites_list",$devicesites) ;
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
        $res=new \App\Models\Fdps;
        $res->fdp_no=$request->input("fdp_no");
        $res->fdp_device_id=$request->input("fdp_device_id");
        $res->device_address=$request->input("device_address");
        $res->device_status=$request->input("device_status");
        $res->devicesites_id=$request->input("devicesites_id");
        $res->save();

        $request->session()->flash("msg","New Service Added");
        return redirect("fdp");
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
