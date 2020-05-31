<?php

namespace App\Singleton;

use App\Singleton\Singleton;

interface SingletonInterface
{
    public static function getInstance() :Singleton;
}