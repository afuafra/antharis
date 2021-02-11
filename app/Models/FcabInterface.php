<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FcabInterface extends Model
{
    public function Fcabs(){


        return $this->belongsTo('App\Models\Fcab','fcab_id','id');

    }

    public function SplitterInterface(){

        return $this->belongsTo('App\Models\FcabSplitterInterface','fcab_splitter_interfaces_id','id');

    }

    public function Splitter(){

        return $this->belongsTo('App\Models\FcabSplitter','fcab_splitter_device_id','id');
    }

    public function FdpsInterface(){

        return $this->belongsTo(FdpsInterface::class);

    }

    public function Fcab(){

        return $this->belongsTo(FdpsInterface::class);

    }

}
