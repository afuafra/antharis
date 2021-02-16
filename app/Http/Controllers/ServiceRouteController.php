<?php

namespace App\Http\Controllers;

use App\Models\Fidps;
use App\Models\services;
use Illuminate\Http\Request;

class ServiceRouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        if (isset($search)){

            $service = services::with(['fidpsinterface.fidps.fidpsinterface.fdpsinterface.fdps.interface.fcabinterface.fcabs.interface.odfinterface.oltinterface.olt',
                                       'fidpsinterface.fidps.fidpsinterface.fdpsinterface.fdps.interface.fcabinterface.fcabs.interface.splitterinterface.splitter',
                                       'fidpsinterface.fidps.fidpsinterface.fdpsinterface.fdps.interface.fcabinterface.fcabs.interface.odfinterface.odfrack.interface'])->where('serviceNumber','like','%'.$search.'%')->first();

//            return $service;

//            dd($service);


            return view("serviceRoute.index")->with("service",$service);
        }
        else{

            return view("serviceRoute.index")->with("service",null);

        }

//        $number  = services::with(['fidpsinterface.Fidps.Interface.FdpsInterface.Fdps.Interface.fcabinterface.Fcabs.Interface.SplitterInterface.splitter',
//            'fidpsinterface.Fidps.Interface.FdpsInterface.Fdps.Interface.fcabinterface.Fcabs',
//            'fidpsinterface.Fidps.Interface.FdpsInterface.Fdps.Interface.fcabinterface.Fcabs.Interface.OdfInterface.odfRack.Interface',
//            'fidpsinterface.Fidps.Interface.FdpsInterface.Fdps.Interface.fcabinterface.Fcabs.Interface.OdfInterface.oltInterface.olt'])->where('serviceNumber','=','BB16693181')->first();
//
////        dd($search);
//        return $number;
//        $id = $services->find(8);


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
