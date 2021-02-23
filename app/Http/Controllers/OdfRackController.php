<?php

namespace App\Http\Controllers;

use App\Models\device_site;
use App\Models\DeviceSite;
use App\Models\odfInterface;
use App\Models\odfRack;
use App\Models\Regions;
use Illuminate\Http\Request;

class OdfRackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $odf=odfRack::orderBy("id","desc")->with('device_site')->with('interface')->paginate();
        $devicesites = DeviceSite::all();
//        $rack=odfInterface::with('')->paginate();
        $regions = Regions::all();
//
//        return $odf;

        return view("odf_racks.index")->with("odf_list",$odf)->with ("devicesites_list",$devicesites)->with ("regions",$regions);
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
        $res=new \App\Models\odfRack();
        $res->region_id=$request->input("region_id");
        $res->odf_rack_name=$request->input("odf_rack_name");
        $res->odf_device_id=$request->input("odf_device_id");
        $res->device_address=$request->input("device_address");
        $res->device_status=$request->input("device_status");
        $res->device_site_id=$request->input("device_site_id");
        $res->save();

        $request->session()->flash("msg","New Service Added");
        return redirect("odf_racks");
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
        $res = \App\Models\odfRack::find($id);

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
        $odfracks = \App\Models\odfRack::find($id);
        $odfracks->delete();
        return redirect()->route('odf_racks.index');
    }

    public function delete($id)
    {
        $odfracks = odfRack::find($id);

        return view('odf_racks.delete', compact('odfracks'));
    }
}
