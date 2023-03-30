<?php

namespace App\Repositories;

use App\Contracts\AddressRepositoryInterface;
use App\Enums\AddressableType;
use App\Enums\PropertyType;
use App\Models\Address;
use Illuminate\Support\Collection;

class AddressRepository implements AddressRepositoryInterface
{
    public function all(): Collection
    {
        return Address::all();
    }

    public function find(int $id): ?Address
    {
        return Address::find($id);
    }

    public function create(array $data): Address
    {
        return Address::create($data);
    }

    public function update(int $id, array $data): bool
    {
        return Address::find($id)->update($data);
    }

    public function delete(int $id): bool
    {
        return Address::find($id)->delete();
    }
}