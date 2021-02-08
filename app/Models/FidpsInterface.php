<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fidps;

class FidpsInterface extends Model
{

    protected $fillable=[
        'fidp_no',
        'fidp_device_id',
        'device_address',
        'device_status',
        'atollislandsite'
    ];

    public function Fidps(){


        return $this->belongsTo('App\Models\Fidps','fidp_id','id');

    }
}
