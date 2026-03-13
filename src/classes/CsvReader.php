<?php

namespace classes;

class CsvReader extends AbstractFileReader
{
    private $formatter;
    public function __construct(string $fileName, callable $formatter)
    {
        parent::__construct($fileName);
        $this->formatter = $formatter;
    }

    public function read(): array
    {
        $file = fopen($this->fileName, 'r');
        fgetcsv($file);// Skip header
        $transactions = [];

        while (($transaction = fgetcsv($file)) !== false) {
            //MUST call transactionFormatter() which returns Transaction object
            $transactions[] = ($this->formatter)($transaction) ;
        }
        fclose($file);
        return $transactions;
    }
}