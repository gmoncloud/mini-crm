<?php

namespace App\Http\Controllers;

use App\Contracts\AddressRepositoryInterface;
use App\Contracts\PropertyRepositoryInterface;
use App\Contracts\PropertyTypeRepositoryInterface;
use App\Http\Requests\PostPropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\Property;
use App\Services\GeocodingService;
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
            'properties' => $this->propertyRepository->paginate(10),
            'property_types' => (new PropertyTypeService($this->propertyTypeRepository))->getPropertyTypes(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostPropertyRequest $request)
    {
        $addressData = [
            'addressable_type' => $request->input('addressable_type'),
            'address_line_1' => $request->input('address_line_1'),
            'address_line_2' => $request->input('address_line_2'),
            'city' => $request->input('city'),
            'country' => $request->input('country'),
            'postcode' => $request->input('postcode'),
        ];

        $addressString = (new PropertyService())->getAddressString($addressData);
        $coordinate = (new GeocodingService(config('app.map_box_token')))->lookupCoordinates($addressString);

        if(!empty($coordinate)){
            $addressData['latitude'] = $coordinate['latitude'];
            $addressData['longitude'] = $coordinate['longitude'];
            $address_id = $this->addressRepository->create($addressData)->id;
        }

        $propertyData = [
            'name'             => $request->input('name'),
            'slug'             => $request->input('slug'),
            'bedrooms'         => $request->input('bedrooms'),
            'bathrooms'        => $request->input('bathrooms'),
            'size'             => $request->input('size'),
            'description'      => $request->input('description'),
            'council_tax_band' => $request->input('council_tax_band'),
            'price'            => $request->input('price'),
            'currency'         => $request->input('currency'),
            'tenure'           => $request->input('tenure'),
            'property_type_id' => 1,
            'address_id'       => $address_id,
        ];

        $this->propertyRepository->create($propertyData);
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
        return redirect(route('properties.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property): RedirectResponse
    {
        $this->propertyRepository->delete($property->id);
        return redirect(route('properties.index'));
    }
}
