<?php
class FileModel
{
  private $fileLocation;

  public function __construct($fileLocations)
  {
    $this->fileLocation = $fileLocations;
  }

  private function getFileType()
  {

  }

  public function getFiles()
  {
    echo $this->fileLocation;
$files = scandir($this->fileLocation);
foreach ($files as $file) {
    $filePath = $this->fileLocation . '/' . $file;
    if (is_file($filePath)) {
        echo $file . "<br>";
    }

    if (is_dir($filePath)) {
      echo $file . "<br>";
  }
}
  }

  private function getFileIcon()
  {

  }

  private function getFileSize()
  {

  }


}