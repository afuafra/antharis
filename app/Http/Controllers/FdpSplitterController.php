<?php

namespace App\Http\Controllers;

use App\Models\FdpSplitter;
use App\Models\Fdps;
use Illuminate\Http\Request;

class FdpSplitterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = FdpSplitter::query();

        if($request->has('search')){

            $searchValue = $request->get('search');

            $query->where('fdp_splitter_device_id','like' ,'%'.$searchValue.'%')
                ->orWhere('fdp_splitter_no', 'like', '%'.$searchValue.'%');

        }

        $splitters   = $query->with('interface')->paginate();


//        $splitters=::orderBy("id","desc")->with(['fcab'])->paginate();
        $fdp = Fdps::all();

//        dd($fcab);
//        return $fdp;

        return view("fdp_splitters.index")->with("splitters",$splitters)->with ("fdp_list",$fdp);
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
//        dd($request->all());
        $res=new \App\Models\FdpSplitter;
        $res->fdp_splitter_no=$request->input("fdp_splitter_no");
        $res->fdp_id=$request->input("fdp_id");
        $res->fdp_splitter_device_id=$request->input("fdp_splitter_device_id");
        $res->save();

        $request->session()->flash("msg","New Service Added");
        return redirect("fdp");
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
