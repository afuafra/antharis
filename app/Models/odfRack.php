<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class odfRack extends Model
{


    use HasFactory;

    protected $fillable=[
        'odf_rack_name',
        'odf_device_id',
        'device_address',
        'device_status',
        'devicesites_id',
        'region_id'

    ];


    public function devicesites(){
        return $this->belongsTo(\App\Models\devicesites::class);
    }

    public function interface()
    {
        return $this->hasMany(odfInterface::class, 'odf_racks_id');
    }


}
