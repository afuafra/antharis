<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class odfRack extends Model
{
    use HasFactory;



    public function devicesites(){
        return $this->belongsTo(\App\Models\devicesites::class);
    }

    public function interface()
    {
        return $this->hasMany(odfInterface::class, 'odf_racks_id');
    }


}
