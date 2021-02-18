<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FidpSplitterInterface extends Model
{
    use HasFactory;


    protected $fillable=[
        'port',
        'fidp_splitter_id',
        'fidps_interface_id'
    ];


    public function splitter()
    {
        return $this->belongsTo(FidpSplitter::class,'fidp_splitter_id');
    }

    public function fidpsinterfaces()
    {
        return $this->belongsTo(FidpsInterface::class,'fidps_interface_id');
    }

}
