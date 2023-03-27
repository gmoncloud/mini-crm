<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);
        return [
            'id'               => $this->id,
            'name'             => $this->name,
            'description'      => $this->description,
            'property_type_id' => $this->property_type_id,
            'slug'             => $this->slug,
            'bedrooms'         => $this->bedrooms,
            'bathooms'         => $this->bathrooms,
            'size'             => $this->size,
            'council_tax_band' => $this->council_tax_band,
            'price'            => $this->price,
            'currency'         => $this->currency,
            'tenure'           => $this->tenure,
            'created_at'       => (string)$this->created_at,
            'updated_at'       => (string)$this->updated_at,
        ];
    }
}
