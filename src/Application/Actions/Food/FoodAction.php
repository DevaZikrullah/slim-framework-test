<?php
declare(strict_types=1);

namespace App\Application\Actions\Food;

use App\Application\Actions\Action;
use App\Domain\Food\FoodRepository;
use Psr\Log\LoggerInterface;

abstract class FoodAction extends Action
{
    protected FoodRepository $foodRepository;

    public function __construct(LoggerInterface $logger, FoodRepository $foodRepository)
    {
        parent::__construct($logger);
        $this->foodRepository = $foodRepository;
    }
}
