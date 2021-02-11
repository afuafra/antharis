<?php

namespace App\Http\Controllers;

use App\Models\FcabInterface;
use App\Models\FcabSplitter;
use App\Models\FcabSplitterInterface;
use App\Models\FdpsInterface;
use App\Models\FidpsInterface;
use Illuminate\Http\Request;

class FdpsInterfaceController extends Controller
{
    public function index()
    {
//            $fdps = FdpsInterface::orderBy("fdp_id","asc")->orderBy("port","asc")->with('Fdps')->paginate();

        $fdps = FdpsInterface::orderBy("fdp_id","asc")->orderBy("port","asc")->with(['Fdps','fcabinterface.Fcabs','fcabinterface','fcabinterface.SplitterInterface.FcabSplitter'])->paginate();
//



//       return $fdps;


            return view("fdps_interface.index")->with("fdps",$fdps);
    }

}
