<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class services extends Model
{
        protected $fillable=[
            'orderNumber',
            'serviceNumber',
            'customerName',
            'customerAddress',
            'serviceStatus'
        ];
}
