<?php

namespace App\Http\Controllers;

use App\Models\Fidps;
use App\Models\FidpsInterface;
use App\Models\FidpSplitter;
use App\Models\FidpSplitterInterface;
use Illuminate\Http\Request;

class FidpSplitterInterfaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            $query = FidpSplitterInterface::query();

            if($request->has('search')){

                $searchValue = $request->get('search');

                $query->where('fidps_interface_id','like' ,'%'.$searchValue.'%')
                    ->orWhere('fidp_splitter_id', 'like', '%'.$searchValue.'%');

            }

            $splitterinterfaces   = $query->with('splitter.fidp.devicesites','fidpsinterfaces')->paginate();


        $splitters=FidpSplitter::paginate();
            $fidpinterfaces = FidpsInterface::with('fidps')->paginate();

//        dd($fcab);
//        return $splitterinterfaces;

            return view("fidp_splitter_interfaces.index")->with("splittersinterfaces",$splitterinterfaces)->with('fidpinterfaces',$fidpinterfaces)->with('splitters',$splitters);
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
        $res=new \App\Models\FidpSplitterInterface();
        $res->port=$request->input("port");
        $res->fidp_splitter_id=$request->input("fidp_splitter_id");
        $res->fidps_interface_id =$request->input("fidps_interface_id");
        $res->save();

        $request->session()->flash("msg","New Service Added");
        return redirect("fidp_splitter_interfaces");
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
