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
        'atollislandsite'
    ];

    protected $table='fidps';

    public function Interfaces()
    {

//        return $this->hasOne('App\Model\FidpInterface', 'fidp_id', 'id ');
    }

}
