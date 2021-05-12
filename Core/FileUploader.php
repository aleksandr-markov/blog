<?php


namespace Core;


class FileUploader
{
    public function upload(File $file): bool
    {
//        var_dump($_SERVER);
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/storage/';
        $uploadFile = $uploadDir . basename($file->getName());

        if (move_uploaded_file($file->getTmpName(), $uploadFile)) {
            return true;
        } else {
            return false;
        }

    }

}