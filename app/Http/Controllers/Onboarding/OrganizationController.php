<?php

namespace App\Http\Controllers\Onboarding;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrganizationRequest;
use App\Services\OrganizationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrganizationController extends Controller
{

    function __construct(private OrganizationService $organizationService)
    {}
    /**
     * Handle the incoming request.
     */
    public function __invoke(OrganizationRequest $request)
    {
        $user = $request->user();

        $this->organizationSetUp($user, $request);

        return response()->json([
            "status" => true,
            "message" => "Organization Created"
        ]);
    }


    function organizationSetUp($user, $request){
        DB::transaction(function () use($user, $request) {
            $organization = $user->organization()->create($request->validated());
            $data = [
                'user_id' => $user->id,
                'role' => RoleEnum::ADMIN->value
            ];
            $this->organizationService->addUserToOrganization($organization, $data);
        });
    }
}
