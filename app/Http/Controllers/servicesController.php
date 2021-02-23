<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateServiceRequest;
use App\Models;
use App\Models\services;
use Illuminate\Http\Request;


class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $query = services::query();

        if($request->has('search')){

            $searchValue = $request->get('search');

            $query->where('orderNumber','like' ,'%'.$searchValue.'%')
                ->orWhere('serviceNumber', 'like', '%'.$searchValue.'%')
                ->orWhere('customerName', 'like', '%'.$searchValue.'%')
                ->orWhere('customerAddress', 'like', '%'.$searchValue.'%');



        }

        $services   = $query->orderBy("id","desc")->with('fidpsinterface.fidps')->paginate();



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
            $res->order_number=$request->input("order_number");
            $res->service_number=$request->input("service_number");
            $res->customer_name=$request->input("customer_name");
            $res->customer_address=$request->input("customer_address");
            $res->service_status=$request->input("service_status");
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
