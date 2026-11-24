<?php

namespace App\Application\UseCases\Authors;

use App\Application\Dtos\Authors\AuthorResponseDto;
use App\Application\Dtos\Authors\CreateAuthorRequestDto;

interface CreateAuthorUseCaseInterface
{
    public function execute(CreateAuthorRequestDto $requestDto): AuthorResponseDto;
}
