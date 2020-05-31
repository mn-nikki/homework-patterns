<?php


namespace App\Proxy;


class BankAccount implements BankAccountInterface
{
    /**
     * @var array
     */
    protected array $transactions = [];


    /**
     * @param int $amount
     * @return $this
     */
    public function deposit(int $amount) : BankAccount
    {
        $this->transactions[] = $amount;
        return $this;
    }

    /**
     * @return int
     */
    public function getBalance(): int
    {
        return (int) array_sum($this->transactions);
    }
}