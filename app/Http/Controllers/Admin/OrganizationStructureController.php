<?php

namespace App\Http\Controllers\Admin;

use App\Enums\StructureEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\StructureRequest;
use App\Models\OrganizationUser;
use App\Services\OrganizationService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrganizationStructureController extends Controller
{

    function __construct(private OrganizationService $organizationService)
    {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $organization = $request->organization;
        return $organization->organizationStructures()->with('lineManager.user:id,name,email')->latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StructureRequest $request)
    {
        $organization = $request->organization;
        $this->organizationService->addStructureToOrganization($organization, $request);

        return response()->json([
            "status" => true,
            "message" => "Structure has been added for organization"
        ]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
