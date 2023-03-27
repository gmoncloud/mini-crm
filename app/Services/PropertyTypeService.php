<?php

namespace App\Services;

use App\Contracts\PropertyTypeRepositoryInterface;
use Illuminate\Support\Collection;

class PropertyTypeService
{
    public function __construct(
        private PropertyTypeRepositoryInterface $propertyTypeRepository
    ){}

    public function getPropertyTypes(): Collection
    {
        return $this->propertyTypeRepository->all();
    }
}