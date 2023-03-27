<?php

namespace App\Contracts;

use App\Models\Property;
use Illuminate\Support\Collection;

interface PropertyRepositoryInterface
{
    public function all(): Collection;

    public function find(int $id): ?Property;

    public function create(array $data): Property;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;

    public function paginate(int $page);
}