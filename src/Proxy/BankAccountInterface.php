<?php


namespace App\Proxy;


interface BankAccountInterface
{
    public function deposit(int $amount);

    public function getBalance(): int;
}