<?php

declare(strict_types = 1);
//phpinfo();

require_once __DIR__ . '/../app/classes/Transaction.php';
require_once __DIR__ . '/../app/classes/AbstractFileReader.php';
require_once __DIR__ . '/../app/classes/CSVReader.php';
require_once __DIR__ . '/../app/classes/TransactionReader.php';
require_once __DIR__ . '/../app/classes/TransactionCalculater.php';
require_once __DIR__ . '/../app/helper.php';

use app\classes\TransactionReader;
use app\classes\TransactionCalculater;

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