<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileHelpers
{

    public static function saveImageRequest($file, $directory)
    {
        // Check if the file was uploaded successfully
        if (!$file->isValid()) {
            throw new \Exception('File upload failed');
        }
        $file_name = basename($file->getClientOriginalName());

        $path = Storage::disk('public')->put($directory . '/' . $file_name, file_get_contents($file));
        
        return $path;
       
    }


    public static function deleteImages(array $imagePaths)
    {
        foreach ($imagePaths as $path) {
            if (file_exists(public_path($path))) {
                unlink(public_path($path));
            }
        }
    }
}
