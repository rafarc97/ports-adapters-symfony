<?php

declare(strict_types=1);

namespace App\orders\list\domain;

enum Status: string
{
    case PENDING = 'pending';
    case CONFIRMED = 'confirmed';
    case SHIPPED = 'shipped';
    case DELIVERED = 'delivered';
}

final readonly class Order
{
    public function __construct(
        public int $id, 
        public string $name, 
        public string $email, 
        public Status $status, 
        public float $totalPrice
    ) {
    }

    public static function create(
        int $id,
        string $name,
        string $email,
    ): self {
        $status = Status::PENDING;
        $totalPrice = 0.0;
        return new self($id,$name,$email,$status,$totalPrice);
    }
}