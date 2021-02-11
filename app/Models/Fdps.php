<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fdps extends Model
{
    protected $fillable=[
        'fdp_no',
        'fdp_device_id',
        'device_address',
        'device_status',
        'devicesites_id'
    ];


    public function Interfaces()
    {

        return $this->belongsTo('App\Models\Fdps','fdp_id','id');
    }
    public function devicesites(){

        return $this->belongsTo(\App\Models\devicesites::class);
    }
}
