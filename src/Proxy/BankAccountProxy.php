<?php


namespace App\Proxy;


class BankAccountProxy implements BankAccountInterface
{
    /**
     * @var int|null
     */
    private ?int $balance = null;

    /**
     * @var BankAccount|null
     */
    private ?BankAccount $account = null;

    /**
     * @var bool
     */
    private bool $depositWas = false;

    /**
     * BankAccountProxy constructor.
     */
    public function __construct()
    {
        $this->account = $this->getAccount();
    }

    private function getAccount()
    {
        if($this->account === null)
        {
            $this->account = new BankAccount();
        }

        return $this->account;
    }

    /**
     * @return int
     */
    public function getBalance(): int
    {
        if($this->balance === null || $this->depositWas)
        {
            $this->balance = $this->account->getBalance();
            $this->depositWas = false;
            echo "Deposit was. "; //для проверки срабатывания функции
        }

        return $this->balance;
    }

    public function deposit(int $amount)
    {
        $this->account->deposit($amount);
        $this->depositWas = true;
    }
}