<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FdpSplitter extends Model
{


    protected $fillable=[
        'fdp_splitter_no',
        'fdp_id',
        'fdp_splitter_device_id'
    ];

    public function fdp(){

        return $this->belongsTo(Fdps::class);
    }


    public function interface()
    {
        return $this->hasMany(FdpSplitterInterface::class, 'fdp_splitter_id');
    }
}
