<?php

namespace App\Api\Controllers\Nightclub;

use App\Api\Controllers\Controller;
use App\Api\Resource\Nightclub\NightclubResource;
use App\Domain\Entity\Nightclub\NightclubRepositoryInterface;
use Illuminate\Http\Request;

class GetNightclubCollectionController extends Controller
{
    /**
     * @var NightclubRepositoryInterface
     */
    private NightclubRepositoryInterface $nightclubRepo;

    /**
     * GetNightclubController constructor.
     * @param NightclubRepositoryInterface $nightclubRepo
     */
    public function __construct(NightclubRepositoryInterface $nightclubRepo)
    {
        $this->nightclubRepo = $nightclubRepo;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $clubs = $this->nightclubRepo->all();

        return NightclubResource::collection($clubs);
    }
}
