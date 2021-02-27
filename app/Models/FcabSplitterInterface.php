<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FcabSplitterInterface extends Model
{

    protected $fillable=[

        'fcab_splitter_id',
        'port',
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
