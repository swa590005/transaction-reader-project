<?php

namespace app\classes;

class TransactionReader
{
    // Add callable $formatter parameter
    public function readDirectory(string $dirPath, callable $formatter): array
    {
        $allTransactions = [];

        foreach (scandir($dirPath) as $file) {
            if (is_dir($file)) {
                continue;
            }
            $file = $dirPath . $file;
            $fileExtension = pathinfo($file, PATHINFO_EXTENSION);

            // choose reader based on file extension
            $reader = match ($fileExtension) {
                'csv' => new CsvReader($file, $formatter),// Pass formatter
                default => null
            };
            $allTransactions = array_merge($allTransactions, $reader->read());
        }
        return $allTransactions;
    }
}