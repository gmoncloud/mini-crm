<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PropertyType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }

}
