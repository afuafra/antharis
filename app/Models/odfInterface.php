<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class odfInterface extends Model
{
    use HasFactory;

    protected $fillable=[
        'odf_no',
        'odf_port',
        'odf_racks_id',
        'olt_interface_id',
    ];
    public function odfrack(){
        return $this->belongsTo ('App\Models\odfRack','odf_racks_id','id');

    }

    public function oltinterface(){
        return $this->belongsTo ('App\Models\oltInterface','olt_interface_id','id');

    }


}
