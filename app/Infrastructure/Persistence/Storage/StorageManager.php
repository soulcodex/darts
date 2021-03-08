<?php

namespace App\Infrastructure\Persistence\Storage;

use Exception;
use Illuminate\Http\UploadedFile;

class StorageManager implements StorageManagerInterface
{
    /**
     * @param UploadedFile $file
     * @param int $id
     * @return string
     * @throws Exception
     */
    public function saveFile(UploadedFile $file, $id): string
    {
        return 'http://lorempixel.com/image/1234';
    }
}
