<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFidpsRequest;
use App\Models;
use App\Models\DeviceSite;
use App\Models\Fidps;
use App\Models\FidpsInterface;
use App\Models\Regions;
use Illuminate\Http\Request;

class FidpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//
        $fidps=Fidps::orderBy("id","desc")->with('device_site','fidpsinterface')->paginate();
        $devicesites = DeviceSite::all();
        $fidpinterface = FidpsInterface::all();
        $regions = Regions::all();
//        return $fidps;


        return view("fidp.index")->with ("devicesites_list",$devicesites)->with(['fidp_list'=>$fidps,'fiinterface'=>$fidpinterface])->with ("regions",$regions);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFidpsRequest $request)
    {

        $res=new \App\Models\Fidps;
        $res->region_id=$request->input("region_id");
        $res->fidp_no=$request->input("fidp_no");
        $res->fidp_device_id=$request->input("fidp_device_id");
        $res->device_address=$request->input("device_address");
        $res->device_status=$request->input("device_status");
        $res->device_site_id=$request->input("device_site_id");
        $res->save();

        $request->session()->flash("msg","New Service Added");
        return redirect("fidp");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {




    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $services=\App\Models\services::find($id);
//        return view('services.index', compact('services'));
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
        $res = \App\Models\Fidps::find($id);

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
        $fidp = \App\Models\Fidps::find($id);
        $fidp->delete();
        return redirect()->route('fidp.index');
    }

    public function delete($id)
    {
        $fidp = Fidps::find($id);

        return view('fidp.delete', compact('fidp'));
    }
}
