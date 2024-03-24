<?php

declare(strict_types=1);

namespace orders\list\domain;

interface OrderRepository
{
    public function searchAllOrders(): array;
}