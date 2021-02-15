<?php

namespace App\Http\Controllers;

use App\Models\Fidps;
use App\Models\FidpSplitter;
use Illuminate\Http\Request;

class FidpSplitterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = FidpSplitter::query();

        if($request->has('search')){

            $searchValue = $request->get('search');

            $query->where('fidp_splitter_device_id','like' ,'%'.$searchValue.'%')
                ->orWhere('fidp_splitter_no', 'like', '%'.$searchValue.'%');

        }

        $splitters   = $query->with('interface')->paginate();


//        $splitters=::orderBy("id","desc")->with(['fcab'])->paginate();
        $fidp = Fidps::all();

//        dd($fcab);
//        return $fidp;

        return view("fidp_splitters.index")->with("splitters",$splitters)->with ("fidp_list",$fidp);
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
        $res=new \App\Models\fidpSplitter;
        $res->fidp_splitter_no=$request->input("fidp_splitter_no");
        $res->fidp_id=$request->input("fidp_id");
        $res->fidp_splitter_device_id=$request->input("fidp_splitter_device_id");
        $res->save();

        $request->session()->flash("msg","New Service Added");
        return redirect("fidp_splitters");
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
