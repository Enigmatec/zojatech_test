<?php

namespace App\Services;

use App\Models\Organization;
use App\Models\User;

class OrganizationService {

    function __construct(){}

    function addUserToOrganization($organization, $data){
        return $organization->organizationUsers()->create($data);
    }


    function addStructureToOrganization($organization, $request){
        $structures = $request->safe()->only('structures')['structures'];
        return $organization->organizationStructures()->createMany($structures);
    }


}