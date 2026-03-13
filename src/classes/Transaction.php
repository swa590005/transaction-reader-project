<?php

namespace classes;

class Transaction
{
    public function __construct(
        private string $date,
        private string $checkNumber,
        private string $description,
        private float $amount
    ) {}

    // ✅ Make sure these getters exist!
    public function getDate(): string {
        return $this->date;
    }

    public function getCheckNumber(): string {
        return $this->checkNumber;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getAmount(): float {
        return $this->amount;
    }

    public function isIncome(): bool {
        return $this->amount >= 0;
    }
}