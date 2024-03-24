<?php

declare(strict_types=1);

namespace App\Tests\orders\list\application;

use orders\list\application\OrdersLister;
use orders\list\domain\OrderRepository;
use orders\list\domain\Order;
use orders\list\domain\StatusEnum;
use orders\list\application\response\OrdersResponse;
use orders\list\application\response\OrderResponse;
use orders\list\domain\exception\OrdersNotFoundException;


use PHPUnit\Framework\TestCase;

class OrdersListerTest extends TestCase
{
    public function test_orders_list(): void
    {

        $orderRepository = $this->createMock(OrderRepository::class);
        $orderRepository->expects(self::once())
            ->method('searchAllOrders')
            ->with()
            ->willReturn([
                new Order(1, 'order 1', 'mail1@mail.com', StatusEnum::PENDING, 5.25),
                new Order(2, 'order 2', 'mail2@mail.com', StatusEnum::PENDING, 10),
            ]);

        $ordersLister = new OrdersLister($orderRepository);
        $result = $ordersLister();

        self::assertInstanceOf(OrdersResponse::class,$result);
        self::assertContainsOnlyInstancesOf(OrderResponse::class, $result->orders());
        self::assertEquals($result->orders()[0]->id, 1);
        self::assertEquals($result->orders()[0]->name, 'order 1');
        self::assertEquals($result->orders()[0]->totalPrice, 5.25);
    }

    public function test_exception(): void
    {
        $this->expectException(OrdersNotFoundException::class);

        $orderRepository = $this->createMock(OrderRepository::class);
        $orderRepository->expects(self::once())
            ->method('searchAllOrders')
            ->with()
            ->willReturn([]);

        $ordersLister = new OrdersLister($orderRepository);
        $ordersLister();
    }
}