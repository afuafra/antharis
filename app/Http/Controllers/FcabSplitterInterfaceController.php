<?php

namespace App\Http\Controllers;

use App\Models\FcabInterface;
use App\Models\FcabSplitter;
use App\Models\FcabSplitterInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FcabSplitterInterfaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fcabsplitterinterface = FcabSplitterInterface::with('splitter.fcab.device_site')->paginate();

        $fcabsplitter = FcabSplitter::paginate();
        $fcabinterfaces = FcabInterface::with('fcabs.device_site')->paginate();

//        return $fcabsplitterinterface;

        return view("fcabs_splitter_interface.index")->with("fcabsplitters",$fcabsplitter)->with("splitterinterfaces",$fcabsplitterinterface)->with("fcabinterfaces",$fcabinterfaces);

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
        $res=new \App\Models\FcabSplitterInterface();
        $res->entity_id=$request->input("entity_id");
        $res->port=$request->input("port");
        $res->fcab_splitter_id=$request->input("fcab_splitter_id");
//        $res->fcab_interface_id=$request->input("fcab_interface_id");
        $res->save();

        $request->session()->flash("msg","New Service Added");
        return redirect("fcabs_splitter_interface");
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
        $res = \App\Models\FcabSplitterInterface::find($id);
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
        $fcabsplitterinterface = \App\Models\FcabSplitterInterface::find($id);
        $fcabsplitterinterface->delete();
        return redirect()->route('fcabs_splitter_interface.index');
    }
    public function delete($id)
    {
        $fcabsplitterinterface = FcabSplitterInterface::find($id);

        return view('fcabs_splitter_interface.delete', compact('fcabsplitterinterface'));
    }



}
