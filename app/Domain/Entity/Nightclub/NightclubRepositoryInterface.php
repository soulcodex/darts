<?php

namespace App\Domain\Entity\Nightclub;

use App\Domain\Entity\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

interface NightclubRepositoryInterface extends RepositoryInterface
{
    /**
     * @return Collection<int, Nightclub>
     */
    public function all(): Collection;

    /**
     * @param int $id
     * @return Nightclub|null
     */
    public function find(int $id): ?Nightclub;

    /**
     * @param int $id
     * @throws ModelNotFoundException
     *
     * @return Nightclub
     */
    public function findOrFail(int $id): Nightclub;

    /**
     * @param Nightclub $club
     * @return Nightclub
     */
    public function add(Nightclub $club): Nightclub;

    /**
     * @param int $id
     * @param array $attributes
     * @return void
     */
    public function update(int $id, array $attributes): void;

    /**
     * @param int $id
     */
    public function delete(int $id): void;
}
