<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FdpsInterface extends Model
{
    public function Fdps(){


        return $this->belongsTo('App\Models\Fdps','fdp_id','id');

    }
    public function fcabinterface(){


        return $this->belongsTo('App\Models\FcabInterface','fcab_interface_id','id');

    }
    public function Fcab(){


        return $this->belongsTo('App\Models\Fcab','fcab_id','id');

    }
    public function Fcabs(){


        return $this->belongsTo('App\Models\Fcab','fcab_id','id');

    }
}
