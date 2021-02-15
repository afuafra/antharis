<?php

namespace App\Http\Controllers;

use App\Models\FdpSplitter;
use Illuminate\Http\Request;

class FdpSplitterInterfaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

//        $query = FdpSplitter::query();
//
////        if($request->has('search')){
////
////            $searchValue = $request->get('search');
////
////            $query->where('fcab_splitter_device_id','like' ,'%'.$searchValue.'%')
////                ->orWhere('fcab_splitter_no', 'like', '%'.$searchValue.'%');
////
////        }
//
//        $splitters   = $query->with('interface')->paginate();
//
//
////        $splitters=::orderBy("id","desc")->with(['fcab'])->paginate();
//        $fcab = Fcab::all();
//
////        dd($fcab);
//        return $query;

//        return view("fcabs_splitter.index")->with("splitters",$splitters);
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
