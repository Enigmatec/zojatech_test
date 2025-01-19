<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    

    function organizationUsers(){
        return $this->hasMany(OrganizationUser::class);
    }

    function organizationStructures(){
        return $this->hasMany(OrganizationStructure::class);
    }
}
