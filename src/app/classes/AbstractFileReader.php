<?php

namespace app\classes;

abstract class AbstractFileReader
{
    protected string $fileName;
    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
        $this->validateFile();
    }

    private function validateFile(): void
    {
        if(!file_exists($this->fileName)){
            trigger_error('File "'.$this->fileName.'" does not exist', E_USER_ERROR);
        }
    }

    abstract public function read(): array;
}