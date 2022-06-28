<?php
declare(strict_types=1);

namespace App\Application\Actions\Food;

use Psr\Http\Message\ResponseInterface as Response;

class ViewFoodAction extends FoodAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $foodId = (int) $this->resolveArg('id');
        $food = $this->foodRepository->findFoodOfId($foodId);

        $this->logger->info("Food of id `${foodId}` was viewed.");

        return $this->respondWithData($food);
    }
}
