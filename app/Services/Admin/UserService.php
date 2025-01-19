<?php

namespace App\Services\Admin;

use App\Services\OrganizationService;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserService {

    function __construct(
        private User $user,
        private OrganizationService $organizationService,
    )
    {}


    function index($organization){
        $users = $this->user->withWhereHas('organizationUser', fn($q) => $q->where('organization_id', $organization->id))
            ->latest()->paginate();

        return $users;

    }


    function store($organization,  $request){


        $user = DB::transaction(function () use($request, $organization) {
            $user = $this->user->create($request->only(['name','email', 'password']));
            $data = [
                ...$request->only(['role', 'job_description']),
                'user_id' => $user->id
            ];
            $this->organizationService->addUserToOrganization($organization, $data);
            return $user;
        });

        return $user;



    }

}