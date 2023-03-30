<?php

namespace App\Contracts;

use App\Models\Address;
use Illuminate\Support\Collection;

interface AddressRepositoryInterface
{
    public function all(): Collection;

    public function find(int $id): ?Address;

    public function create(array $data): Address;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;

}