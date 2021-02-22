<?php

namespace App\Http\Controllers;

use App\Models\odfInterface;
use App\Models\olt;
use App\Models\oltInterface;
use Illuminate\Http\Request;
use App\Models\odfRack;

class OltInterfaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oltinterface=oltinterface::orderBy("id","desc")->with(['olt'])->paginate();
        $olts = olt::all();
        $odfinterface = odfinterface::with('odfRack')->get();

        $oltinterfaces = odfinterface::with('odfRack.interface.oltinterface.olt')->paginate();
        $odfrack = odfRack::all();

        $olt=oltinterface::all();
        $oltinter = odfinterface::with('odfRack.interface.oltinterface.olt')->get();

        $added = compact('olt','oltinter');


//return $oltinterface;

        return view("olt_interfaces.index")->with("olt_interface",$oltinterface)->with ("olt_list",$olts)->with ("odf_interface",$odfinterface);
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
        $res=new \App\Models\oltInterface();
        $res->olt_frame=$request->input("olt_frame");
        $res->olt_card=$request->input("olt_card");
        $res->olt_port=$request->input("olt_port");
        $res->olts_id=$request->input("olts_id");
        $res->save();

        $request->session()->flash("msg","New Service Added");
        return redirect("olt_interfaces");
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
        $oltinterface = \App\Models\oltInterface::find($id);
        $oltinterface->delete();
        return redirect()->route('olt_interfaces.index');
    }

    public function delete($id)
    {
        $oltinterface = OltInterface::find($id);

        return view('olt_interfaces.delete', compact('oltinterface'));
    }
}
