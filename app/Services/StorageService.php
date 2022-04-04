<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class StorageService
{
    public function saveImage($file, $folder)
    {
        $path = Storage::disk('public')
            ->putFile($folder, $file, 'public');

        return $path;
    }

    public function updateImage($newFile, $oldFile, $folder)
    {
        $photo_path = Storage::disk('public')
            ->putFile($folder, $newFile, 'public');

        Storage::disk('public')->delete($oldFile);

        return $photo_path;
    }
}
