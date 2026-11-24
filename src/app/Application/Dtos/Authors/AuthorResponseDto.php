<?php

namespace App\Application\Dtos\Authors;

use DateTimeImmutable;

class AuthorResponseDto
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly DateTimeImmutable $createdAt,
        public readonly DateTimeImmutable $updatedAt,
    ) {}
}
