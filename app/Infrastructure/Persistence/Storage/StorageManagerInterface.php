<?php

namespace App\Infrastructure\Persistence\Storage;

use Illuminate\Http\UploadedFile;

interface StorageManagerInterface
{
    /**
     * @param UploadedFile $file
     * @param mixed $id
     * @return string
     */
    public function saveFile(UploadedFile $file, $id): string;
}
