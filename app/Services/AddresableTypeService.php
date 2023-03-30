<?php

namespace App\Services;

use App\Contracts\PropertyTypeRepositoryInterface;
use App\Enums\AddressableType;
use Illuminate\Support\Collection;

class AddresableTypeService
{
    public function getAddressableTypes(): Collection
    {
        return AddressableType::getLabelText();
    }
}
