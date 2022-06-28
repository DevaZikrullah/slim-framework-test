<?php
declare(strict_types=1);

namespace App\Application\Actions\Food;

use Psr\Http\Message\ResponseInterface as Response;

class ListFoodsAction extends FoodAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $foods = $this->foodRepository->findAll();

        $this->logger->info("Food list was viewed.");

        return $this->respondWithData($foods);
    }
}
