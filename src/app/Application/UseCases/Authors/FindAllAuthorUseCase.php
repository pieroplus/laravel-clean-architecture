<?php

namespace App\Application\UseCases\Authors;

use App\Application\Dtos\Authors\AuthorResponseDto;
use App\Domain\Repositories\AuthorRepositoryInterface;
use Override;

class FindAllAuthorUseCase implements FindAllAuthorUseCaseInterface
{
    public function __construct(
        private AuthorRepositoryInterface $authorRepository
    ) {}

    /**
     * @return list<AuthorResponseDto>
     */
    #[Override]
    public function execute(): array
    {
        $authors = $this->authorRepository->findAll();

        return array_map(
            function ($author) {
                return new AuthorResponseDto(
                    id: $author->getId(),
                    name: $author->getName(),
                    createdAt: $author->getCreatedAt(),
                    updatedAt: $author->getUpdatedAt(),
                );
            },
            $authors
        );
    }
}
