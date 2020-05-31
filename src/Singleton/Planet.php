<?php


namespace App\Singleton;


class Planet extends Singleton implements PlanetInterface
{
    /**
     * @var array
     */
    private array $props;

    /**
     * @param string $name
     * @return string
     */
    public function getProp(string $name): string
    {
        return $this->props[$name];
    }

    /**
     * @return array
     */
    public function getAllProps(): array
    {
        return $this->props;
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function setProp(string $name, $value): void
    {
        $this->props[$name] = $value;
    }

}