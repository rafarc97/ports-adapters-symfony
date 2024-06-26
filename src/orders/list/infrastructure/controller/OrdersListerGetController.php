<?php

declare(strict_types=1);

namespace orders\list\infrastructure\controller;

use orders\list\application\OrdersLister;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

final class OrdersListerGetController
{

    public function __construct(private OrdersLister $ordersLister)
    {
    }

    #[Route('/orders-lister', methods: ['GET'], name: 'orders-lister')]
    public function __invoke()
    {
        // $response = ($this->ordersLister)();
        $response = $this->ordersLister->__invoke();

        $jsonData = json_encode($response->orders(), JSON_PRETTY_PRINT);

        return new JsonResponse($jsonData, Response::HTTP_OK, [], true);
    }
}