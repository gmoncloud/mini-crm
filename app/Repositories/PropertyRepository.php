<?php

namespace App\Repositories;

use App\Contracts\PropertyRepositoryInterface;
use App\Models\Property;
use Illuminate\Support\Collection;

class PropertyRepository implements PropertyRepositoryInterface
{
    public function all(): Collection
    {
        return Property::all();
    }

    public function find(int $id): ?Property
    {
        return Property::find($id);
    }

    public function create(array $data): Property
    {
        return Property::create($data);
    }

    public function update(int $id, array $data): bool
    {
        return Property::find($id)->update($data);
    }

    public function delete(int $id): bool
    {
        return Property::find($id)->delete();
    }

    public function paginate(int $page)
    {
        return Property::paginate($page);
    }
}