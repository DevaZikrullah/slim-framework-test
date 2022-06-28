<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Food;

use App\Domain\Food\Food;
use App\Domain\Food\FoodRepository;
use App\Domain\Food\FoodNotFoundException;

class InMemoryFoodRepository implements FoodRepository
{
    /**
     * @var Food[]
     */
    private array $foods;

    /**
     * @param Food[]|null $foods
     */
    public function __construct(array $foods = null)
    {
        $this->foods = $foods ?? [
            1 => new Food(1, 'Chiken Wings', 'Desc Chiken Wings'),
            2 => new Food(2, 'Mochi', 'Desc Mochi'),
            3 => new Food(3, 'Sushi', 'Desc Sushi'),
            4 => new Food(4, 'Chiken Foot', 'Desc Chiken Foot'),
            5 => new Food(5, 'Chiken Head', 'Desc Chiken Head'),
        ];
        //Or get All From Database
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->foods);
    }

    /**
     * {@inheritdoc}
     */
    public function findFoodOfId(int $id): Food
    {
        if (!isset($this->foods[$id])) {
            throw new FoodNotFoundException();
        }

        return $this->foods[$id];
    }
}
