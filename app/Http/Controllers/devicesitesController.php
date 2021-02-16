<?php

namespace App\Http\Controllers;

use App\Models;
use App\Models\devicesites;
use Illuminate\Http\Request;

class devicesitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $query = devicesites::query();

        if($request->has('search')){

            $searchValue = $request->get('search');

            $query->where('AtollCity','like' ,'%'.$searchValue.'%')
                ->orWhere('IslandDistrict', 'like', '%'.$searchValue.'%')
                ->orWhere('Site', 'like', '%'.$searchValue.'%')
                ->orWhere('atollislandsite', 'like', '%'.$searchValue.'%');

        }

        $devicesites   = $query->paginate();

        return view("devicesites.index")->with("devicesites",$devicesites);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("devicesites.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {

            $res=new \App\Models\devicesites();
            $res->AtollCity=$request->input("AtollCity");
            $res->IslandDistrict=$request->input("IslandDistrict");
            $res->Site=$request->input("Site");
            $res->atollislandsite=$request->input("atollislandsite");
//            $res->atollislandsit=$request -> collect ('AtollCity'."IslandDistrict"."Site");
            $res->save();

            $request->session()->flash("msg","New Devicesite Added");
            return redirect("devicesites");
        }
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
