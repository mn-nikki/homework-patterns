<?php


namespace App\Singleton;


interface PlanetInterface
{
    public function getProp(string $name) : string;
    public function getAllProps() : array;
    public function setProp(string $name, $value) : void;
}