<?php

namespace App\Contracts;

use App\Models\PropertyType;
use Illuminate\Support\Collection;

interface PropertyTypeRepositoryInterface
{
    public function all(): Collection;

    public function getAllActivePropertyType(): Collection;

    public function find(int $id): ?PropertyType;

    public function create(array $data): PropertyType;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;

    public function paginate(int $page);
}