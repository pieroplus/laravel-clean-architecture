<?php

namespace App\Application\Dtos\Authors;

class FindByIdAuthorRequestDto
{
    public function __construct(
        public readonly string $id
    ) {}
}
