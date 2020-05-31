<?php declare(strict_types=1);

use App\Singleton\ConsoleLogger;
use App\Singleton\Planet;
use App\Proxy\BankAccount;
use App\Proxy\BankAccountProxy;

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Реализация паттерна Singleton
 * Пример 1
 */
ConsoleLogger::log("Console log, Hello");

$cl1 = ConsoleLogger::getInstance();
$cl2 = ConsoleLogger::getInstance();

if ($cl1 === $cl2) {
    ConsoleLogger::log("СonsoleLogger имеет 1 экземпляр и реализует паттерн Singleton");
} else {
    ConsoleLogger::log("СonsoleLogger имеет более 1 экземпляра и не реализует паттерн Singleton");
}
/**
 * Реализация паттерна Singleton
 * Пример 2
 */
$mars = Planet::getInstance();
$mars->setProp("name", "Mars");
$mars->setProp("minTemp", -153);
$mars->setProp("maxTemp", +35);
$mars->setProp("color", "red");

echo "object Mars:";
print_r($mars->getAllProps());

#Объявим 2рой экземпляр
$marsNew = Planet::getInstance();

echo "object MarsNew:";
print_r($marsNew->getAllProps());

if ($mars === $marsNew) {
    ConsoleLogger::log("Значения в новом экземляре сохраняются, значит класс Planet реализует паттерн Singleton.");
}

/**
 * Реализация паттерна Proxy.
 * Мы имеем метод в классе BankAccount getBalance, который считает сумму всех транзакций.
 * Это метод, может оказаться тяжеловесным в случае, если в объекте содержится много транзацкий.
 * Рационально будет создать proxy класс, который будет считать сумму транзакций по новой только тогда, когда это нужно.
 */

$account = new BankAccountProxy();

$account->deposit(2500);
$account->deposit(-500);
$account->deposit(-300);

#Первый раз произойдет подсчет и значение запишется в свойство $balanse
echo sprintf("Balance: %s \n", $account->getBalance());
#При повторном вызове, подсчет происходить не будет, т.к нового пополнения на счет не было, для этого добавил сообщение Deposite was.
echo sprintf("Balance: %s \n", $account->getBalance());
#Спишем с баланса еще 100
$account->deposit(-100);
#Получим опять значение баланса, теперь снова будет происходить подсчет, т.к было новое списание
echo sprintf("Balance: %s \n", $account->getBalance());



