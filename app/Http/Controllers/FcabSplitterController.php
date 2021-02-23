<?php

namespace App\Http\Controllers;

use App\Models\devicesites;
use App\Models\Fcab;
use App\Models\FcabSplitter;
use Illuminate\Http\Request;

class FcabSplitterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $query = FcabSplitter::query();

        if($request->has('search')){

            $searchValue = $request->get('search');

            $query->where('fcab_splitter_device_id','like' ,'%'.$searchValue.'%')
                ->orWhere('fcab_splitter_no', 'like', '%'.$searchValue.'%');

        }

        $splitters   = $query->with('interface')->paginate();


//        $splitters=::orderBy("id","desc")->with(['fcab'])->paginate();
        $fcab = Fcab::all();

//        dd($fcab);
//        return $splitters;

        return view("fcabs_splitter.index")->with("splitters",$splitters)->with ("fcab_list",$fcab);
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
        $res=new \App\Models\FcabSplitter;
        $res->fcab_splitter_no=$request->input("fcab_splitter_no");
        $res->fcab_id=$request->input("fcab_id");
        $res->fcab_splitter_device_id=$request->input("fcab_splitter_device_id");
        $res->save();

        $request->session()->flash("msg","New Service Added");
        return redirect("fidp");
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
        $res = \App\Models\FcabSplitter::find($id);

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
        $fcab_splitter = \App\Models\FcabSplitter::find($id);
        $fcab_splitter->delete();
        return redirect()->route('fcabs_splitter.index');
    }

    public function delete($id)
    {
        $fcab_splitter = FcabSplitter::find($id);

        return view('fcabs_splitter.delete', compact('fcab_splitter'));
    }
}
