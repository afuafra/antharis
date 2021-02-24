<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fdps extends Model
{
    protected $fillable=[
        'fdp_no',
        'device_type',
        'fdp_device_id',
        'device_address',
        'device_status',
        'device_site_id',
        'region_id'
    ];


    public function interface()
    {
        return $this->hasMany(FdpsInterface::class, 'fdp_id');
    }

    public function device_site(){

        return $this->belongsTo(\App\Models\DeviceSite::class);
    }



}
