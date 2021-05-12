<?php


namespace Core;


class FileRequest
{
    protected $files;

    public function __construct()
    {
        $this->files = $_FILES;
    }

    public function get(string $key)
    {
        return new File($this->files[$key] ?? null);
    }

}