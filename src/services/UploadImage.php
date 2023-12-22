<?php

namespace services;

class UploadImage
{
    static public function upload($image)
    {
        $dirUpload = __DIR__ . '/../../assets/images/uploads/';
        $newFileName = uniqid() . '_' . $image['name'];
        $filePath = $dirUpload . $newFileName;
        if (move_uploaded_file($image['tmp_name'], $filePath)) {
            return $newFileName;
        }
    }
}
