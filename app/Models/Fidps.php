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
        'device_site_id'
    ];

    protected $table='fidps';

    public function device_site(){

        return $this->belongsTo(\App\Models\DeviceSite::class);
    }

    public function fidpsinterface()
    {
        return $this->hasMany(FidpsInterface::class, 'fidp_id');
    }
}
