<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FcabSplitter extends Model
{
    protected $fillable=[
        'fcab_splitter_no',
        'fcab_id',
        'fcab_splitter_device_id'
    ];

    public function fcab(){

        return $this->belongsTo(Fcab::class);
    }

    public function splitterdevice(){

        return $this->belongsToMany('App\Models\FcabSplitterInterface','fcab_splitter_id');
    }

    public function Interface()
    {
        return $this->hasMany(FcabSplitterInterface::class, 'fcab_splitter_id');
    }
}
