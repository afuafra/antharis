<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fcab extends Model
{
    public function FcabSplitter()
    {

        return $this->belongsTo(FcabSplitter::class);
    }

    public function fdp()
    {

        return $this->belongsTo(FdpsInterface::class);
    }
    public function devicesites(){
        return $this->belongsTo(\App\Models\devicesites::class);
    }
}
