<?php

declare(strict_types=1);

namespace App\orders\list\infrastructure\controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

final class OrdersListerGetController
{
    #[Route('orders-lister', methods: ['GET'], name: 'orders-lister')]
    public function __invoke(): JsonResponse
    {
        return new JsonResponse(['Testing Controller']);
    }
}