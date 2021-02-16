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

    public function fidpsinterface()
    {
        return $this->hasMany(FidpsInterface::class, 'service_id');
    }

    public function fdps()
    {
        return $this->hasMany(FdpsInterface::class, 'service_id');
    }



}
