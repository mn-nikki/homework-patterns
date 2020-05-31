<?php


namespace App\Singleton;


class ConsoleLogger extends Singleton
{

    /**
     * @var false|resource
     */
    private $console;

    /**
     * Logger constructor.
     */
    protected function __construct()
    {
        $this->console = fopen('php://stdout', 'w');
    }

    /**
     * @param string $message
     */
    public function writeLog(string $message): void
    {
        $date = date('Y-m-d');
        fwrite($this->console, "$date: $message\n");
    }

    /**
     * @param string $message
     */
    public static function log(string $message): void
    {
        $logger = static::getInstance();
        $logger->writeLog($message);
    }
}