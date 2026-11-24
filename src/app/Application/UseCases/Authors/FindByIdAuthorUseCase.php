<?php

namespace App\Application\UseCases\Authors;

use App\Application\Dtos\Authors\AuthorResponseDto;
use App\Application\Dtos\Authors\FindByIdAuthorRequestDto;
use App\Application\Exceptions\Authors\AuthorNotFoundException;
use App\Domain\Repositories\AuthorRepositoryInterface;
use Override;

class FindByIdAuthorUseCase implements FindByIdAuthorUseCaseInterface
{
    public function __construct(
        private AuthorRepositoryInterface $authorRepository
    ) {}

    #[Override]
    public function execute(FindByIdAuthorRequestDto $requestDto): AuthorResponseDto
    {
        $author = $this->authorRepository->findById($requestDto->id);

        if ($author === null) {
            throw new AuthorNotFoundException;
        }

        return new AuthorResponseDto(
            id: $author->getId(),
            name: $author->getName(),
            createdAt: $author->getCreatedAt(),
            updatedAt: $author->getUpdatedAt(),
        );
    }
}
