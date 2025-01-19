<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationStructure extends Model
{
    
    function lineManager(){
        return $this->belongsTo(OrganizationUser::class, 'line_manager_id', 'id');
    }

    function items(){
        return $this->hasMany(OrganizationStrutureData::class);
    }
}
