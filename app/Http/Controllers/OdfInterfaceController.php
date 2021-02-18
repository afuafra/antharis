<?php

namespace App\Http\Controllers;

use App\Models\odfInterface;
use App\Models\odfRack;
use App\Models\olt;
use App\Models\oltInterface;
use Illuminate\Http\Request;

class OdfInterfaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $query = odfInterface::query();

        if($request->has('search')){

            $searchValue = $request->get('search');

            $query->where('odf_no','like' ,'%'.$searchValue.'%')
                ->orWhere('odf_port', 'like', '%'.$searchValue.'%')
                ->orWhere('odf_racks_id', 'like', '%'.$searchValue.'%')
                ->orWhere('olt_interface_id', 'like', '%'.$searchValue.'%');



        }
        $odfinterface= $query ->with('oltinterface.olt')->paginate();


        $oltInterfaces = oltInterface::with('olt')->paginate();
//
        $odfrack = odfRack::paginate();


//return $odfinterface;

        return view("odf_interfaces.index")->with("odfInterface_list",$odfinterface)->with("oltInterfaces",$oltInterfaces)->with("odfracks",$odfrack) ;
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
        $res=new \App\Models\odfInterface();
        $res->odf_no=$request->input("odf_no");
        $res->odf_port=$request->input("odf_port");
        $res->odf_racks_id=$request->input("odf_racks_id");
        $res->olt_interface_id=$request->input("olt_interface_id");
        $res->save();

        $request->session()->flash("msg","New Service Added");
        return redirect("odf_interfaces");
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
        $res = \App\Models\odfInterface::find($id);
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
        //
    }
}
