<?php

namespace Core;

class File
{
    protected $name;

    protected $type;

    protected $size;

    protected $tmpName;

    protected $error;

    public function __construct(array $file)
    {
        $this->name = $file['name'];
        $this->type = $file['type'];
        $this->size = $file['size'];
        $this->tmpName = $file['tmp_name'];
        $this->error = $file['error'];
    }

    public function getName()
    {
        return $this->name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getTmpName()
    {
        return $this->tmpName;
    }

    public function getError()
    {
        return $this->error;
    }

    public function upload()
    {
        $fileUploader = new FileUploader();
        return $fileUploader->upload($this);
    }
}
