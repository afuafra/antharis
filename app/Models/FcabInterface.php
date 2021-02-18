<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FcabInterface extends Model
{

    protected $fillable=[
        'terminal_side',
        'port',
        'fcab_id'
    ];
    public function fcabs(){


        return $this->belongsTo('App\Models\Fcab','fcab_id','id');

    }

    public function splitterinterface(){

        return $this->belongsTo('App\Models\FcabSplitterInterface','fcab_splitter_interfaces_id','id');

    }

    public function splitter(){

        return $this->belongsTo('App\Models\FcabSplitter','fcab_splitter_device_id','id');
    }

    public function fdpsinterface(){

        return $this->belongsTo(FdpsInterface::class);

    }

    public function fcab(){

        return $this->belongsTo(FdpsInterface::class);

    }

    public function odfinterface(){

        return $this->belongsTo('App\Models\odfInterface','odf_interfaces_id','id');

    }


}
