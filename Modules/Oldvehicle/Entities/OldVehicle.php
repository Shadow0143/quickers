<?php

namespace Modules\Oldvehicle\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OldVehicle extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Oldvehicle\Database\factories\OldVehicleFactory::new();
    }
}
