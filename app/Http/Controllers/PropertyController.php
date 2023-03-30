<?php

namespace App\Http\Controllers;

use App\Contracts\AddressRepositoryInterface;
use App\Contracts\PropertyRepositoryInterface;
use App\Contracts\PropertyTypeRepositoryInterface;
use App\Http\Requests\PostPropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\Property;
use App\Services\AddresableTypeService;
use App\Services\PropertyService;
use App\Services\PropertyTypeService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class PropertyController extends Controller
{
    public function __construct(
        private PropertyRepositoryInterface $propertyRepository,
        private AddressRepositoryInterface $addressRepository,
        private PropertyTypeRepositoryInterface $propertyTypeRepository,
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Property/Index', [
            'addressable_types' => (new AddresableTypeService())->getAddressableTypes(),
            'properties' => $this->propertyRepository->getPropertyWithAddressPagination(2),
            'property_types' => (new PropertyTypeService($this->propertyTypeRepository))->getPropertyTypes(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostPropertyRequest $request)
    {
        (new PropertyService(
            $this->propertyRepository,
            $this->addressRepository
        ))->store($request);
        return redirect(route('properties.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        return Inertia::render('Property/Index', [
            'properties' => $this->propertyRepository->find($property->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropertyRequest $request, Property $property): RedirectResponse
    {
        $this->propertyRepository->update($property->id, $request->validated());
        $this->addressRepository->update($property->address_id, $request->validated());

        return redirect(route('properties.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property): RedirectResponse
    {
        $this->propertyRepository->delete($property->id);
        $this->addressRepository->delete($property->id);

        return redirect(route('properties.index'));
    }
}
