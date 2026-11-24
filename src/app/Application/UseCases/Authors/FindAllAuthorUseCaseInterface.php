<?php

namespace App\Application\UseCases\Authors;

use App\Application\Dtos\Authors\AuthorResponseDto;

interface FindAllAuthorUseCaseInterface
{
    /**
     * @return list<AuthorResponseDto>
     */
    public function execute(): array;
}
