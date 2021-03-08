<?php

namespace App\Domain\Entity\Nightclub;

use App\Infrastructure\Persistence\Eloquent\Cast\Json;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Nightclub
 * @property string name
 * @property string address
 * @property float price
 * @property bool parking
 * @property array coordinates
 * @property string details
 * @property string cover
 * @method self find(int $id)
 */
class Nightclub extends Model
{
    protected $fillable = [
        'name',
        'price',
        'address',
        'parking',
        'coordinates',
        'details',
        'cover'
    ];

    protected $casts = [
        'coordinates' => Json::class
    ];
}
