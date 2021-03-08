<?php

namespace App\Application\Command\Nightclub\Create;

use Illuminate\Http\UploadedFile;

class CreateNightclubQuery
{
    private string $name;

    private float $price;

    private string $address;

    private bool $parking;

    private array $coordinates;

    private string $details;

    private UploadedFile $cover;

    /**
     * CreateNightclubQuery constructor.
     * @param string $name
     * @param float $price
     * @param string $address
     * @param bool $parking
     * @param array $coordinates
     * @param string $details
     * @param UploadedFile $cover
     */
    public function __construct(
        string $name,
        float $price,
        string $address,
        bool $parking,
        array $coordinates,
        string $details,
        UploadedFile $cover
    ){
        $this->name = $name;
        $this->price = $price;
        $this->address = $address;
        $this->parking = $parking;
        $this->coordinates = $coordinates;
        $this->details = $details;
        $this->cover = $cover;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return bool
     */
    public function getParking(): bool
    {
        return $this->parking;
    }

    /**
     * @return array
     */
    public function getCoordinates(): array
    {
        return $this->coordinates;
    }

    /**
     * @return string
     */
    public function getDetails(): string
    {
        return $this->details;
    }

    /**
     * @return UploadedFile
     */
    public function getCover(): UploadedFile
    {
        return $this->cover;
    }
}
