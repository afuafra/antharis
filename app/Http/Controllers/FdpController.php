<?php

namespace App\Http\Controllers;

use App\Models\devicesites;
use App\Models\Fdps;
use App\Models\Regions;
use Illuminate\Http\Request;

class FdpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $query = Fdps::query();

        if($request->has('search')){

            $searchValue = $request->get('search');

            $query->where('fdp_no','like' ,'%'.$searchValue.'%')
                ->orWhere('fdp_device_id', 'like', '%'.$searchValue.'%')
                ->orWhere('device_address', 'like', '%'.$searchValue.'%')
                ->orWhere('devicesites_id', 'like', '%'.$searchValue.'%');

        }

        $fdps   = $query->orderBy("id","desc")->paginate();

        $devicesites = devicesites::all();
        $regions = Regions::all();
//        return $devicesites;

        return view("fdp.index")->with("fdp_list",$fdps)->with ("devicesites_list",$devicesites)->with ("regions",$regions) ;
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
        $res->region_id=$request->input("region_id");
        $res->fdp_no=$request->input("fdp_no");
        $res->device_type=$request->input("device_type");
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
        $res = \App\Models\Fdps::find($id);

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
        $fdp = \App\Models\Fdps::find($id);
        $fdp->delete();
        return redirect()->route('fdp.index');
    }

    public function delete($id)
    {
        $fdp = Fdps::find($id);

        return view('fdp.delete', compact('fdp'));
    }
}
