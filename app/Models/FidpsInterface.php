<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fidps;

class FidpsInterface extends Model
{

    protected $fillable=[
        'terminal_side',
        'port',
        'fidp_id',
        'service_id',
        'fidp_splitter_interface_id',
        'fdps_interface_id'
    ];

    public function fidps(){


        return $this->belongsTo('App\Models\Fidps','fidp_id','id');

    }

    public function fdps(){


        return $this->belongsTo(Fidpsinterface::class);

    }

    public function fdpsinterface()
    {
        return $this->belongsTo(FdpsInterface::class, 'fdps_interface_id');
    }

    public function services()
    {
        return $this->belongsTo(services::class, 'service_id');
    }

}
