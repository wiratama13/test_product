<?php

namespace App\Classes;

use Illuminate\Support\Facades\File;
use Imagick;

class Image {
    public static function toWebp ($image, $target) {
        if(!$image instanceof Imagick) {
            $imagick = new Imagick();

            $imagick->readImage($image->path());

            $image = $imagick;
        }

        File::ensureDirectoryExists($target);
        $image->writeImage("{$target}.webp");
    }

    public static function createThumbnail($image, $location) {
        $extension  = $image->getClientOriginalExtension();
        $path       = $image->path();
        $name       = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);

        if($extension == 'pdf') {
            $path .= '[0]';
        }

        $imagick    = new Imagick();
        $imagick->readImage($path);

        $width      = $imagick->getImageWidth();
        $cropWidth  = $width * 0.8;
        $cropHeight = $cropWidth * 3 / 4;

        $imagick->cropImage($cropWidth, $cropHeight, $width/2 - $cropWidth/2, 0);
        $imagick->mergeImageLayers(Imagick::LAYERMETHOD_MERGE);
        $imagick->scaleImage(320, 240);
        
        $fullPath = storage_path("app/public/{$location}/{$name}");

        if($extension != "webp") {
            static::toWebp($imagick, $fullPath);
        } else {
            $imagick->writeImage("{$fullPath}.{$extension}");
        }

        return "{$location}/{$name}.webp";
    }

    public static function upload($image, $location) {
        $extension  = $image->getClientOriginalExtension();
        $name       = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);

        if($extension != 'webp') {
            $fullPath = storage_path("app/public/{$location}/{$name}");
            static::toWebp($image, $fullPath);
        } else {
            $image->storeAs($location, "{$name}.webp");
        }

        return "{$location}/{$name}.webp";
    }
}