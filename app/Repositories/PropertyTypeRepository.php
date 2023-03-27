<?php

namespace App\Repositories;

use App\Contracts\PropertyTypeRepositoryInterface;
use App\Models\PropertyType;
use Illuminate\Support\Collection;

class PropertyTypeRepository implements PropertyTypeRepositoryInterface
{
    public function all(): Collection
    {
        return PropertyType::all();
    }

    public function find(int $id): ?PropertyType
    {
        return PropertyType::find($id);
    }

    public function create(array $data): PropertyType
    {
        return PropertyType::create($data);
    }

    public function update(int $id, array $data): bool
    {
        return PropertyType::find($id)->update($data);
    }

    public function delete(int $id): bool
    {
        return PropertyType::find($id)->delete();
    }

    public function paginate(int $page)
    {
        return PropertyType::paginate($page);
    }
}