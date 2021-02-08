<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class olt extends Model
{
    protected $fillable=[
        'olt_name',
        'olt_device_id',
        'devicesites_id'
    ];

    public function devicesites(){
        return $this->belongsTo(\App\Models\devicesites::class);
    }

    public function Interfaces()
    {

        return $this->belongsTo(oltInterface::class);
    }

}
