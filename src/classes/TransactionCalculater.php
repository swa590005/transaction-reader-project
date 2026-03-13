<?php

namespace classes;

class TransactionCalculater
{
    public function calculateTotal(array $transactions): array
    {
        $totals = [
            'netTotal' => 0,
            'totalIncome'=> 0,
            'totalExpense' => 0
        ];

        foreach ($transactions as $transaction) {

            $amount =$transaction->getAmount();
            $totals['netTotal'] += $amount;

            if($transaction->IsIncome()){
                $totals['totalIncome'] += $amount;
            }else{
                $totals['totalExpense'] += $amount;
            }
        }
        return $totals;
    }
}