<?php

namespace App\Application\UseCases\Authors;

use App\Application\Dtos\Authors\AuthorResponseDto;
use App\Application\Dtos\Authors\FindByIdAuthorRequestDto;

interface FindByIdAuthorUseCaseInterface
{
    public function execute(FindByIdAuthorRequestDto $id): AuthorResponseDto;
}
