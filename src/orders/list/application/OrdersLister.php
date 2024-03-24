<?php

declare(strict_types=1);

namespace orders\list\application;

use orders\list\domain\OrderRepository;
use orders\list\application\response\OrdersResponse;
use orders\list\application\response\OrderResponse;
use orders\list\domain\exception\OrdersNotFoundException;
use orders\list\domain\Order;
use function Lambdish\Phunctional\map;

final class OrdersLister
{
    public function __construct(private readonly OrderRepository $orderRepository)
    {
    }

    public function __invoke(): OrdersResponse
    {
        $orders = $this->orderRepository->searchAllOrders();

        if(empty($orders)){
            throw new OrdersNotFoundException();
        }

        return new OrdersResponse(...map($this->toResponse(), $orders));
    }

    private function toResponse(): callable
    {
        return static fn(Order $order) => new OrderResponse(
                $order->id, 
                $order->name, 
                $order->totalPrice
        );
    }
}