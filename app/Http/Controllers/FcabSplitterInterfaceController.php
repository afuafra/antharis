<?php

namespace App\Http\Controllers;

use App\Models\FcabInterface;
use App\Models\FcabSplitter;
use App\Models\FcabSplitterInterface;
use Illuminate\Http\Request;

class FcabSplitterInterfaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fcabsplitterinterface = FcabSplitterInterface::with('splitter')->paginate();

        $fcabsplitter = FcabSplitter::paginate();
        $fcabinterfaces = FcabInterface::with('fcabs')->paginate();
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
        //
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
