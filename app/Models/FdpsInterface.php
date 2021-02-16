<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FdpsInterface extends Model
{
    public function fdps(){


        return $this->belongsTo('App\Models\Fdps','fdp_id','id');

    }
    public function fcabinterface(){


        return $this->belongsTo('App\Models\FcabInterface','fcab_interface_id','id');

    }
    public function fcab(){


        return $this->belongsTo('App\Models\Fcab','fcab_id','id');

    }
    public function fcabs(){


        return $this->belongsTo('App\Models\Fcab','fcab_id','id');

    }

    public function parent()
    {
        return $this->belongsTo(fdps::class, 'id', 'fdp_id');
    }

    public function interface()
    {
        return $this->hasMany(fdpsinterface::class, 'fdp_id');
    }

    public function fdp()
    {
        return $this->belongsTo(fdps::class,'fdp_id');
    }

}
