<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fcab extends Model

{
    protected $fillable=[
        'fcab_no',
        'fcab_device_id',
        'device_address',
        'device_status',
        'device_site_id',
        'region_id'

    ];


    public function fcabsplitter()
    {

        return $this->belongsTo(FcabSplitter::class);
    }

    public function fdp()
    {

        return $this->belongsTo(FdpsInterface::class);
    }
    public function device_site(){

        return $this->belongsTo(\App\Models\DeviceSite::class);
    }

    public function interface()
    {
        return $this->hasMany(FcabInterface::class, 'fcab_id');
    }


}
