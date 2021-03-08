<?php

namespace App\Application\Command\Nightclub\Create;

use App\Domain\Entity\Nightclub\Nightclub;
use App\Domain\Entity\Nightclub\NightclubRepositoryInterface;
use App\Infrastructure\Persistence\Storage\StorageManagerInterface;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateNightclubCommand
{
    use Dispatchable;

    /**
     * @var CreateNightclubQuery $query
     */
    private CreateNightclubQuery $query;

    /**
     * CreateNightclubCommand constructor.
     * @param CreateNightclubQuery $query
     */
    public function __construct(CreateNightclubQuery $query)
    {
        $this->query = $query;
    }

    /**
     * @param NightclubRepositoryInterface $nightclubRepository
     * @param StorageManagerInterface $storageManager
     * @return Nightclub
     */
    public function handle(
        NightclubRepositoryInterface $nightclubRepository,
        StorageManagerInterface $storageManager
    ): Nightclub {
        $club = new Nightclub();
        $club->name = $this->query->getName();
        $club->price = $this->query->getPrice();
        $club->address = $this->query->getAddress();
        $club->parking = $this->query->getParking();
        $club->coordinates = $this->query->getCoordinates();
        $club->details = $this->query->getDetails();
        $club->cover = '';

        $created = $nightclubRepository->add($club);

        $coverUrl = $storageManager->saveFile($this->query->getCover(), $created->id);
        $created->cover = $coverUrl;
        $created->save();

        return $created;
    }
}
