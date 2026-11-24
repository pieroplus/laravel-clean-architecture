<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Author;

interface AuthorRepositoryInterface
{
    public function save(Author $author): Author;

    public function findById(string $id): ?Author;

    /**
     * @return list<Author>
     */
    public function findAll(): array;
}
