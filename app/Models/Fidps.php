<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fidps extends Model
{

    protected $fillable=[
        'fidp_no',
        'fidp_device_id',
        'device_address',
        'device_status',
        'devicesites_id'
    ];

    protected $table='fidps';

    public function devicesites(){

        return $this->belongsTo(\App\Models\devicesites::class);
    }

}
