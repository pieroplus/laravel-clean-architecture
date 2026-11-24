<?php

namespace App\Application\UseCases\Authors;

use App\Application\Dtos\Authors\AuthorResponseDto;
use App\Application\Dtos\Authors\CreateAuthorRequestDto;
use App\Application\Exceptions\Authors\AuthorCreateException;
use App\Application\Utils\GenerateUuidInterface;
use App\Application\Utils\TransactionManagerInterface;
use App\Domain\Entities\Author;
use App\Domain\Repositories\AuthorRepositoryInterface;
use Override;
use Throwable;

class CreateAuthorUseCase implements CreateAuthorUseCaseInterface
{
    public function __construct(
        private GenerateUuidInterface $generateUuid,
        private AuthorRepositoryInterface $authorRepository,
        private TransactionManagerInterface $transactionManager,
    ) {}

    #[Override]
    public function execute(CreateAuthorRequestDto $requestDto): AuthorResponseDto
    {
        $id = $this->generateUuid->generate();
        $author = new Author($id, $requestDto->name);

        try {
            /** @var Author $createdAuthor */
            $createdAuthor = $this->transactionManager->transaction(
                function () use ($author): Author {
                    return $this->authorRepository->save($author);
                }
            );
        } catch (Throwable $e) {
            throw new AuthorCreateException(previous: $e);
        }

        return new AuthorResponseDto(
            id: $createdAuthor->getId(),
            name: $createdAuthor->getName(),
            createdAt: $createdAuthor->getCreatedAt(),
            updatedAt: $createdAuthor->getUpdatedAt(),
        );
    }
}
