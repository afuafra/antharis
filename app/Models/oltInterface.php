<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class oltInterface extends Model
{

    protected $fillable=[
        'entity_id'

    ];

    public function olt(){

        return $this->belongsTo ('App\Models\olt','olts_id','id');
    }

    public function odfinterface(){
        return $this->hasMany('App\Models\odfInterface','odf_interfaces_id','id');

    }

}
