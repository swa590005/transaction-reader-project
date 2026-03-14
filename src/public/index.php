<?php

declare(strict_types = 1);
//phpinfo();
spl_autoload_register(function ($className) {
    $path =__DIR__.'/../' .lcfirst(str_replace('\\', '/', $className)) .'.php';
    if(file_exists($path)){
        require $path;
    }
});
require_once __DIR__ . '/../app/helper.php';
use App\Classes\TransactionReader;
use App\Classes\TransactionCalculater;

// Correct path to the directory
$dirPath = __DIR__ . '/../transaction_files/';
$transactions = [];
$totals = [];

// Read transactions
$reader = new TransactionReader();
$transactions = $reader->readDirectory($dirPath, 'transactionFormatter');

// Calculate totals
$calculateTotals = new TransactionCalculater();
$totals = $calculateTotals->calculateTotal($transactions);

require_once __DIR__ . '/../views/transactions-view.php';