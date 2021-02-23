<?php

namespace App\Http\Controllers;

use App\Models\Fcab;
use App\Models\FcabInterface;
use App\Models\odfInterface;
use Illuminate\Http\Request;

class FcabInterfaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fcabInterface = FcabInterface::orderBy("fcab_id","asc")->orderBy("port","asc")->with(['Fcabs','SplitterInterface','Splitter'])->paginate();

        $odfinterfaces = odfInterface::with('odfrack')->paginate();
//
        $fcablist = Fcab::paginate();

//       return $fcablist;


        return view("fcabs_interface.index")->with("fcabsinterfaces",$fcabInterface)->with("odfInterfaces",$odfinterfaces)->with("fcablist",$fcablist);
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
        $res=new \App\Models\FcabInterface();
        $res->terminal_side=$request->input("terminal_side");
        $res->port=$request->input("port");
        $res->odf_interfaces_id=$request->input("odf_interfaces_id");
        $res->fcab_id=$request->input("fcab_id");
        $res->fcab_splitter_interfaces_id=$request->input("fcab_splitter_interfaces_id");
        $res->fcab_splitter_device_id=$request->input("fcab_splitter_device_id");
        $res->save();

        $request->session()->flash("msg","New Service Added");
        return redirect("fcabs_interface");
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
        $res = \App\Models\FcabInterface::find($id);
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
