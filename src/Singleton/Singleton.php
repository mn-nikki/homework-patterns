<?php

namespace App\Singleton;


use App\Singleton\SingletonInterface;

abstract class Singleton implements SingletonInterface
{
    /**
     * @var array
     */
    private static array $instances = [];

    /**
     * @return static
     */
    public static function getInstance(): self
    {
        $subclass = static::class;
        if (!isset(self::$instances[$subclass])) {
            self::$instances[$subclass] = new static;
        }
        return self::$instances[$subclass];
    }

    protected function __construct(){}

    protected function __clone(){}

    protected function __wakeup(){}
}