<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FcabSplitterInterface extends Model
{
    public function FcabSplitter(){

        return $this->belongsTo(FcabSplitter::class );
    }

}
