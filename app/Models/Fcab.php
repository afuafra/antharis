<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fcab extends Model
{
    public function Interfaces()
    {

        return $this->belongsTo(FcabSplitter::class);
    }

    public function fdp()
    {

        return $this->belongsTo(FdpsInterface::class);
    }


}
