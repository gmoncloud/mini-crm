<?php

namespace App\Http\Controllers;

use App\Contracts\PropertyTypeRepositoryInterface;
use App\Http\Requests\PropertyTypeRequest;
use App\Models\PropertyType;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class PropertyTypeController extends Controller
{
    public function __construct(
        private PropertyTypeRepositoryInterface $propertyTypeRepository
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('PropertyTypes/Index', [
            'property_types' => $this->propertyTypeRepository->paginate(10),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyTypeRequest $request)
    {
        $this->propertyTypeRepository->create($request->validated());
        return redirect(route('property_types.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(PropertyType $propertyType)
    {
        return Inertia::render('PropertyTypes/Index', [
            'property_types' => $this->propertyTypeRepository->find($propertyType->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyTypeRequest $request, PropertyType $propertyType): RedirectResponse
    {
        $this->propertyTypeRepository->update($propertyType->id, $request->validated());
        return redirect(route('property_types.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PropertyType $propertyType): RedirectResponse
    {
        $this->propertyTypeRepository->delete($propertyType->id);
        return redirect(route('property_types.index'));
    }
}
