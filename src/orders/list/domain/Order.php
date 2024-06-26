<?php

declare(strict_types=1);

namespace orders\list\domain;

final readonly class Order
{
    public function __construct(
        public int $id, 
        public string $name, 
        public string $email, 
        public StatusEnum $status, 
        public float $totalPrice
    ) {
    }

    public static function create(
        int $id,
        string $name,
        string $email,
    ): self {
        $status = StatusEnum::PENDING;
        $totalPrice = 0.0;
        return new self($id,$name,$email,$status,$totalPrice);
    }
}