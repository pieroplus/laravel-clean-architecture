<?php

namespace App\Domain\Entities;

use DateTimeImmutable;

class Author
{
    public function __construct(
        private string $id,
        private string $name,
        private DateTimeImmutable $createdAt = new DateTimeImmutable,
        private DateTimeImmutable $updatedAt = new DateTimeImmutable,
    ) {}

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTimeImmutable
    {
        return $this->updatedAt;
    }
}
