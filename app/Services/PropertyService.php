<?php

namespace App\Services;

use App\Enums\AddressableType;

class PropertyService
{
    public function getAddressString(array $address)
    {
        unset($address['addressable_type']);
        unset($address['postcode']);

        return implode(' ', array_filter( $address, 'strlen' ));
    }

}