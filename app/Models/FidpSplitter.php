<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FidpSplitter extends Model
{
    use HasFactory;

    protected $fillable=[
        'fidp_splitter_no',
        'fidp_id',
        'fidp_splitter_device_id'
    ];

    public function fidp(){

        return $this->belongsTo(Fidps::class);
    }


    public function interface()
    {
        return $this->hasMany(FidpSplitterInterface::class, 'fidp_splitter_id');
    }
}
