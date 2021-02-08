<?php

namespace App\Http\Controllers;

use App\Models\Fidps;
use App\Models\FidpsInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FidpsInterfaceController extends Controller
{
    public function index()
    {

//        $fidpsinterface=fidps_interface::with('Fidps')->find('id');

//        $fidps = fidps_interface::with('fidps')->get();



//        $fidpinterface = FidpsInterface::get();
        $fidps = FidpsInterface::orderBy("fidp_id","asc")->orderBy("port","asc")->with('Fidps')->paginate();

//       return $fidps;


        return view("fidps_interface.index")->with("fidps",$fidps);


    }
}
