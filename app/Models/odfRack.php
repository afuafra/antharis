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
        'device_site_id',
        'region_id'

    ];


    public function device_site(){
        return $this->belongsTo(\App\Models\DeviceSite::class);
    }

    public function interface()
    {
        return $this->hasMany(odfInterface::class, 'odf_racks_id');
    }


}
