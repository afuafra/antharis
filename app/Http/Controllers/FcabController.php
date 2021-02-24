<?php

namespace App\Http\Controllers;


use App\Models\DeviceSite;
use App\Models\Fcab;
use App\Models\FcabInterface;
use App\Models\Regions;
use Illuminate\Http\Request;

class FcabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $query = Fcab::query();

        if($request->has('search')){

            $searchValue = $request->get('search');

            $query->where('fcab_no','like' ,'%'.$searchValue.'%')
                ->orWhere('fcab_device_id', 'like', '%'.$searchValue.'%')
                ->orWhere('device_address', 'like', '%'.$searchValue.'%')
                ->orWhere('device_site_id', 'like', '%'.$searchValue.'%');

        }

        $fcab   = $query->orderBy("id","desc")->with(['interface','Interface.Splitter','Interface.SplitterInterface'])->paginate();


        $regions = Regions::all();
        $devicesite = DeviceSite::all();

//return $devicesite;

        return view("fcab.index")->with("fcab_list",$fcab)->with ("devicesites_list",$devicesite)->with ("regions",$regions) ;
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
        $res->region_id=$request->input("region_id");
        $res->fcab_no=$request->input("fcab_no");
        $res->fcab_device_id=$request->input("fcab_device_id");
        $res->device_address=$request->input("device_address");
        $res->device_status=$request->input("device_status");
        $res->device_site_id=$request->input("device_site_id");
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
        $res = \App\Models\Fcab::find($id);

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
        $fcab = \App\Models\Fcab::find($id);
        $fcab->delete();
        return redirect()->route('fcab.index');
    }

    public function delete($id)
    {
        $fcab = Fcab::find($id);

        return view('fcab.delete', compact('fcab'));
    }
}
