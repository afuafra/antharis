<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller

{
//    public function services(){
//        return view("services");
//    }

    public function inventory(){
        return view('inventory');
    }

    public function connectivity(){
        return view('connectivity');
    }

//    public function welcome(){
//        return view("/");
//    }

}
