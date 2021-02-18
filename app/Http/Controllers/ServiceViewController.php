<?php

namespace App\Http\Controllers;

use App\Models\FdpsInterface;
use App\Models\services;
use Illuminate\Http\Request;

class ServiceViewController extends Controller
{
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

//        return $services;

        return view("service_view.index")->with("services",$services);
    }
}
