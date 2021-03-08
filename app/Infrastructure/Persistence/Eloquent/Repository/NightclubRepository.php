<?php

namespace App\Infrastructure\Persistence\Eloquent\Repository;

use App\Domain\Entity\Nightclub\Nightclub;
use App\Domain\Entity\Nightclub\NightclubRepositoryInterface;
use App\Infrastructure\Persistence\Eloquent\AbstractRepository;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class NightclubRepository extends AbstractRepository implements NightclubRepositoryInterface
{
    /**
     * NightclubRepository constructor.
     * @param Nightclub $model
     */
    public function __construct(Nightclub $model)
    {
        parent::__construct($model);
    }

    /**
     * @param int $id
     * @return Nightclub|null
     */
    public function find(int $id): ?Nightclub
    {
        return $this->model->find($id);
    }

    /**
     * @param int $id
     * @return Nightclub
     */
    public function findOrFail(int $id): Nightclub
    {
        $club = $this->find($id);

        if($club instanceof Nightclub) {
            return $club;
        }

        throw new ModelNotFoundException(
            sprintf('Model %s with id %d not found', Nightclub::class, $id)
        );
    }

    /**
     * @param Nightclub $club
     * @return Nightclub
     * @throws Exception
     */
    public function add(Nightclub $club): Nightclub
    {
        return $this->model->create($club->getAttributes());
    }

    /**
     * @param int $id
     * @param array $attributes
     */
    public function update(int $id, array $attributes): void
    {
        $club = $this->findOrFail($id);

        $club->update($attributes);
    }

    /**
     * @param int $id
     * @throws Exception
     */
    public function delete(int $id): void
    {
        $club = $this->findOrFail($id);

        $club->delete();
    }

    /**
     * @param int $itemsPerPage
     * @return LengthAwarePaginator
     */
    public function paginate(int $itemsPerPage): LengthAwarePaginator
    {
        return $this->getQueryBuilder()->paginate($itemsPerPage);
    }

    /**
     * @return Builder
     */
    public function getQueryBuilder(): Builder
    {
        return $this->model->newQuery();
    }
}
