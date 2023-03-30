<?php

namespace App\Services;

use App\Contracts\AddressRepositoryInterface;
use App\Contracts\PropertyRepositoryInterface;
use App\Http\Requests\PostPropertyRequest;

class PropertyService
{
    public function __construct(
        private PropertyRepositoryInterface $propertyRepository,
        private AddressRepositoryInterface $addressRepository
    ){}

    public function getAddressString(array $address)
    {
        unset($address['addressable_type']);
        unset($address['postcode']);

        return implode(' ', array_filter( $address, 'strlen' ));
    }

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

        $coordinate = (new GeocodingService(config('app.map_box_token')))->lookupCoordinates($this->getAddressString($addressData));

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
            'property_type_id' => $request->input('property_type_id'),
            'address_id'       => $address_id,
        ];

        $property = $this->propertyRepository->create($propertyData);

        if ($images = $request->file('images')) {
            foreach ($images as $image) {
                $property->addMedia($image)->toMediaCollection('images');
            }
        }
    }
}