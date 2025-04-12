<?php
class FileModel
{
    private $fileLocation;

    public function __construct($fileLocation)
    {
        $this->fileLocation = $fileLocation;
    }

    public function getItems()
    {
        return scandir($this->fileLocation);
    }
}