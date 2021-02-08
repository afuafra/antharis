<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateServiceRequest;
use App\Models;
use Illuminate\Http\Request;


class ServicesController extends Controller
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
//        $services=\App\Models\services::find($id);
//        return view('services.index', compact('services'));
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
//        return request()->all();


        $res = \App\Models\services::find($id);

//        $this->validate($request, [
//            'orderNumber' => 'required',
//            'serviceNumber' => 'required',
//            'customerName' => 'required',
//            'customerAddress' => 'required',
//            'serviceStatus' => 'required'
//        ]);

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
