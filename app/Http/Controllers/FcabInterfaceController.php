<?php

namespace App\Http\Controllers;

use App\Models\Fcab;
use App\Models\FcabInterface;
use App\Models\FcabSplitter;
use App\Models\FcabSplitterInterface;
use App\Models\odfInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FcabInterfaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fcabInterface = FcabInterface::orderBy("fcab_id","asc")->orderBy("port","asc")->with(['Fcabs.device_site','SplitterInterface','Splitter','odfinterface.odfrack'])->paginate();

        $odfinterfaces = odfInterface::with('odfrack')->paginate();
//
        $fcablist = Fcab::paginate();

        $fcabsplitters = FcabSplitter::paginate();

        $fcabsplitterinterfaces = FcabSplitterInterface::with('splitter')->paginate();

        $interface = FcabSplitter::with('interface')->paginate();

        $splitters = DB::table('fcab_splitters')->pluck("fcab_splitter_device_id","id");
//       return $interface;


        return view("fcabs_interface.index",compact('splitters'))->with("fcabsinterfaces",$fcabInterface)->with("odfInterfaces",$odfinterfaces)->with("fcablist",$fcablist)->with("fcabsplitters" , $fcabsplitters)->with("fcabsplitterinterfaces" , $fcabsplitterinterfaces);
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
        $res->entity_id=$request->input("entity_id");
        $res->terminal_side=$request->input("terminal_side");
        $res->port=$request->input("port");
        $res->odf_interfaces_id=$request->input("odf_interfaces_id");
        $res->fcab_id=$request->input("fcab_id");
        $res->fcab_splitter_interfaces_id=$request->input("fcab_splitter_interfaces_id");
        $res->fcab_splitter_device_id=$request->input("fcab_splitter_device_id");
        $res->save();

//        $consumed= \App\Models\FcabSplitterInterface::find($request->input("fcab_splitter_interfaces_id"));
//        $consumed->consumed=1;
//        $consumed->save();

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
        $consumed = \App\Models\FcabSplitterInterface::find($res->fcab_splitter_interfaces_id);
        $consumed->consumed=0;
        $res->entity_id=$request->input("entity_id");
        $res->terminal_side=$request->input("terminal_side");
        $res->port=$request->input("port");
        $res->odf_interfaces_id=$request->input("odf_interfaces_id");
        $res->fcab_id=$request->input("fcab_id");
        $res->fcab_splitter_interfaces_id=$request->input("fcab_splitter_interfaces_id");
        $res->fcab_splitter_device_id=$request->input("fcab_splitter_device_id");
        $res->save();
        $consumed->save();


        $consumed= \App\Models\FcabSplitterInterface::find($request->input("fcab_splitter_interfaces_id"));
        $consumed->consumed=1;
        $consumed->save();

//        $input = $request->all();
//
//        $res->fill($input)->save();

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
        $fcabinterface = \App\Models\FcabInterface::find($id);
        $fcabinterface->delete();

        $consumed= \App\Models\FcabSplitterInterface::find($fcabinterface->fcab_splitter_interfaces_id);
        $consumed->consumed=0;
        $consumed->save();

        return redirect()->route('fcabs_interface.index');
    }

    public function delete($id)
    {
        $fcabinterface = FcabInterface::find($id);

        return view('fcabs_interface.delete', compact('fcabinterface'));
    }

    public function getStates($id)
    {
        $states = DB::table("fcab_splitter_interfaces")->where("consumed",0)->where("fcab_splitter_id",$id)->pluck("port","id");
        return json_encode($states);
    }

}
