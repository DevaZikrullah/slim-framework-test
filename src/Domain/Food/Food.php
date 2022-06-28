<?php
declare(strict_types=1);

namespace App\Domain\Food;

use JsonSerializable;

class Food implements JsonSerializable
{
    private ?int $id;

    private string $name;

    private string $desc;


    public function __construct(?int $id, string $name, string $desc)
    {
        $this->id = $id;
        $this->name = strtolower($name);
        $this->desc = ucfirst($desc);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFoodName(): string
    {
        return $this->name;
    }

    public function getDesc(): string
    {
        return $this->desc;
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'desc' => $this->desc,
        ];
    }
}