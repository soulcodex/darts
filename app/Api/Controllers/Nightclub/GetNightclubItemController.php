<?php

namespace App\Api\Controllers\Nightclub;

use App\Api\Controllers\Controller;
use App\Api\Resource\Nightclub\NightclubResource;
use App\Domain\Entity\Nightclub\NightclubRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class GetNightclubItemController extends Controller
{
    /**
     * @var NightclubRepositoryInterface
     */
    private NightclubRepositoryInterface $nightclubRepo;

    /**
     * GetNightclubItemController constructor.
     * @param NightclubRepositoryInterface $nightclubRepo
     */
    public function __construct(NightclubRepositoryInterface $nightclubRepo)
    {
        $this->nightclubRepo = $nightclubRepo;
    }

    /**
     * @param int $id
     * @param Request $request
     * @return NightclubResource
     */
    public function __invoke(int $id, Request $request): NightclubResource
    {
        try {
            $club = $this->nightclubRepo->findOrFail($id);

            return new NightclubResource($club);
        } catch (ModelNotFoundException $e) {
            dd($e);
        }
    }
}
