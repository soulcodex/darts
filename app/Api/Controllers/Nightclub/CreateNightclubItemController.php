<?php

namespace App\Api\Controllers\Nightclub;

use App\Api\Controllers\Controller;
use App\Api\Resource\Nightclub\NightclubResource;
use App\Application\Command\Nightclub\Create\CreateNightclubCommand;
use App\Application\Command\Nightclub\Create\CreateNightclubQuery;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class CreateNightclubItemController extends Controller
{
    /**
     * @param Request $request
     * @return NightclubResource
     */
    public function __invoke(Request $request): NightclubResource
    {
        try {
            $query = new CreateNightclubQuery(
                $request->get('name'),
                $request->get('price'),
                $request->get('address'),
                $request->get('parking'),
                $request->get('coordinates'),
                $request->get('details'),
                UploadedFile::fake()->image('111.png')
            );

            $command = new CreateNightclubCommand($query);
            $club = $this->dispatchNow($command);
            return new NightclubResource($club);
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
