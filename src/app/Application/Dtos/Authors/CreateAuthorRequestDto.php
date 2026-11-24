<?php

namespace App\Application\Dtos\Authors;

class CreateAuthorRequestDto
{
    public function __construct(
        public readonly string $name
    ) {}
}
