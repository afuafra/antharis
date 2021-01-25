<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateServiceRequest;
use App\Models;
use Illuminate\Http\Request;


class servicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services=\App\Models\services::paginate();
        return view("services.index")->with("services",$services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("services.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateServiceRequest $request)
    {
//        return $request->all();


            $res=new \App\Models\services;
            $res->orderNumber=$request->input("orderNumber");
            $res->serviceNumber=$request->input("serviceNumber");
            $res->customerName=$request->input("customerName");
            $res->customerAddress=$request->input("customerAddress");
            $res->serviceStatus=$request->input("serviceStatus");
            $res->save();

            $request->session()->flash("msg","New Service Added");
            return redirect("services");

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
