<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Entities\Author;
use App\Domain\Repositories\AuthorRepositoryInterface;
use App\Infrastructure\Models\AuthorModel;
use Override;

class AuthorRepository implements AuthorRepositoryInterface
{
    #[Override]
    public function save(Author $author): Author
    {
        $model = AuthorModel::create(
            [
                'id' => $author->getId(),
                'name' => $author->getName(),
            ]
        );

        return $this->toEntity($model);
    }

    #[Override]
    public function findById(string $id): ?Author
    {
        $model = AuthorModel::find($id);

        return $model ? $this->toEntity($model) : null;
    }

    #[Override]
    public function findAll(): array
    {
        return AuthorModel::all()
            ->map(fn ($model) => $this->toEntity($model))
            ->all();
    }

    private function toEntity(AuthorModel $model): Author
    {
        return new Author(
            id: $model->id,
            name: $model->name,
            createdAt: $model->created_at->toImmutable(),
            updatedAt: $model->updated_at->toImmutable(),
        );
    }
}
