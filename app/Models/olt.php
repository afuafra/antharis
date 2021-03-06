<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use OwenIt\Auditing\Contracts\Auditable;


class olt extends Model
{


    protected $fillable=[
        'olt_name',
        'olt_device_id',
        'device_address',
        'device_status',
        'device_site_id',
        'region_id'

    ];


    public function device_site()
    {
        return $this->belongsTo(DeviceSite::class);
    }

    public function interface()
    {
        return $this->hasMany(oltInterface::class, 'olts_id');
    }

    public function region()
    {
        return $this->belongsTo(\App\Models\Regions::class);
    }

}


