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
        $oltinterface=oltinterface::orderBy("id","desc")->with(['olt','odfinterface','odfinterface.odfRack'])->paginate();


        $olt = olt::all();
        $odfInterface = odfInterface::all();
        $odfrack = odfRack::all();

//return $oltinterface;

        return view("olt_interfaces.index")->with("olt_list",$oltinterface)->with ("olt",$olt)->with ("odf_interface",$odfInterface) ;
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
