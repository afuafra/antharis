<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class odfInterface extends Model
{
    use HasFactory;


    public function odfRack(){
        return $this->belongsTo ('App\Models\odfRack','odf_racks_id','id');

    }


}
