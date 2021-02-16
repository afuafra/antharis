<?php

namespace App\Models;

use App\Observers\UserActionsObserver;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{

    public static function boot()
    {
        parent::boot();
        User::observe(new \App\Observers\UserActionsObserver);
    }

}
