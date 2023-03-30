<?php

namespace App\Http\Controllers\Api;

use App\Contracts\PropertyRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyResource;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PropertyController extends Controller
{
    public function __construct(
        private PropertyRepositoryInterface $propertyRepository
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Cache::remember('properties', 60, function () {
            return $this->propertyRepository->all();
        });

        return PropertyResource::collection($properties);
    }

}
