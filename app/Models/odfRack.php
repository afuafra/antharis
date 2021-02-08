<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class odfRack extends Model
{
    use HasFactory;


    public function Interfaces()
    {

        return $this->belongsTo(odfInterface::class);
    }


}
