<?php

namespace App\Trait;

trait UploadImage
{
    public function uploadImage($photo,$folder){
        $imgName = $photo->hashName();
        $path = $folder;
        $photo->move($path,$imgName);
        return $imgName;
    }
}
