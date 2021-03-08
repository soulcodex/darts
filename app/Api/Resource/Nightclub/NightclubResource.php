<?php

namespace App\Api\Resource\Nightclub;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NightclubResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'address' => $this->address,
            'coordinates' => $this->coordinates,
            'details' => $this->details,
            'cover' => $this->cover
        ];
    }
}
