<?php

namespace App\Models;

use App\Enums\AddressableType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'addressable_type',
        'address_line_1',
        'address_line_2',
        'city',
        'country',
        'postcode',
        'latitude',
        'longitude',
    ];

    protected $casts = [
        'addressable_type' => AddressableType::class,
    ];

    public function properties(): HasMany

    {
        return $this->hasMany(Property::class);
    }
}
