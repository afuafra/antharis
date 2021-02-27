<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FcabSplitterInterface extends Model
{

    protected $fillable=[
        'fdp_no',
        'device_type',
        'fdp_device_id',
        'device_address',
        'device_status',
        'device_site_id',
        'region_id',
        'entity_id'
    ];


    public function fcabSplitter(){

        return $this->belongsTo(FcabSplitter::class );
    }


    public function interface()
    {
        return $this->hasMany(FcabSplitterInterface::class, 'fcab_splitter_id');
    }

    public function splitter()
    {
        return $this->belongsTo(FcabSplitter::class,'fcab_splitter_id');
    }

    public function fcabinterfaces()
    {
        return $this->belongsTo(FcabInterface::class,'fcab_interface_id');
    }

}
