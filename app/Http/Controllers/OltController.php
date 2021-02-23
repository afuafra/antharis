<?php

namespace App\Http\Controllers;

use App\Models\devicesites;
use App\Models\olt;
use App\Models\Regions;
use Illuminate\Http\Request;

class OltController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $olt=olt::orderBy("id","desc")->with('devicesites')->with('interface')->with('region')->paginate();
        $devicesites = devicesites::all();
        $regions = Regions::all();

//        return $olt;

        return view("olts.index")->with("olt_list",$olt)->with ("devicesites_list",$devicesites)->with ("regions",$regions) ;
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
        $res=new \App\Models\olt();
        $res->region_id=$request->input("region_id");
        $res->olt_name=$request->input("olt_name");
        $res->olt_device_id=$request->input("olt_device_id");
        $res->device_address=$request->input("device_address");
        $res->device_status=$request->input("device_status");
        $res->devicesites_id=$request->input("devicesites_id");
        $res->save();

        $request->session()->flash("msg","New Service Added");
        return redirect("olts");
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
        $res = \App\Models\olt::find($id);

        $input = $request->all();

        $res->fill($input)->save();

        return $res;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $olt = \App\Models\olt::find($id);
        $olt->delete();
        return redirect()->route('olts.index');
    }
    public function delete($id)
    {
        $olt = olt::find($id);

        return view('olts.delete', compact('olt'));
    }
}
