<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrganizationStructure;
use Illuminate\Http\Request;

class StructureItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, OrganizationStructure $structure)
    {
        return $structure->items()->latest()->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, OrganizationStructure $structure)
    {
        $validated = $request->validate([
            'items' => ['bail', 'required', 'array'],
            'items.*.item' => ['bail', 'required', 'url'],
            'items.*.title' => ['bail', 'required', 'string']

        ]);
        
        return $structure->items()->createMany($validated['items']);
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
