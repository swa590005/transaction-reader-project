<?php

use classes\Transaction;

function formatDollarAmount(float $amount): string
{
    $isNegative = $amount < 0;
    return ($isNegative ? '-' : '') . '$' . number_format(abs($amount), 2);
}

function formatDate(string $date): string
{
    return date('M j Y', strtotime($date));
}

function transactionFormatter(array $transactionRow):Transaction
{
    [$date, $checkNumber, $description, $amount] = $transactionRow;
    $amount = (float) str_replace([',',"$"], '', $amount);

    // Return Transaction OBJECT, not array!
    return new Transaction($date, $checkNumber, $description, $amount);
}