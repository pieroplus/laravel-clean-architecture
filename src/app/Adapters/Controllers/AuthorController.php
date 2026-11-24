<?php

namespace App\Adapters\Controllers;

use App\Adapters\Requests\Authors\CreateAuthorRequest;
use App\Application\Dtos\Authors\AuthorResponseDto;
use App\Application\Dtos\Authors\CreateAuthorRequestDto;
use App\Application\Dtos\Authors\FindByIdAuthorRequestDto;
use App\Application\UseCases\Authors\CreateAuthorUseCaseInterface;
use App\Application\UseCases\Authors\FindAllAuthorUseCaseInterface;
use App\Application\UseCases\Authors\FindByIdAuthorUseCaseInterface;
use Illuminate\Http\JsonResponse;

class AuthorController
{
    public function __construct(
        private FindAllAuthorUseCaseInterface $findAllUseCase,
        private FindByIdAuthorUseCaseInterface $findByIdUseCase,
        private CreateAuthorUseCaseInterface $createAuthorUseCase
    ) {}

    public function index(): JsonResponse
    {
        $authors = $this->findAllUseCase->execute();

        return response()->json(
            array_map(function (AuthorResponseDto $author) {
                return [
                    'id' => $author->id,
                    'name' => $author->name,
                    'createdAt' => $author->createdAt,
                    'updatedAt' => $author->updatedAt,
                ];
            }, $authors), 200);
    }

    public function show(string $id): JsonResponse
    {
        $requestDto = new FindByIdAuthorRequestDto($id);
        $author = $this->findByIdUseCase->execute($requestDto);

        return response()->json([
            'id' => $author->id,
            'name' => $author->name,
            'createdAt' => $author->createdAt,
            'updatedAt' => $author->updatedAt,
        ], 200);
    }

    public function store(CreateAuthorRequest $request): JsonResponse
    {
        $requestDto = new CreateAuthorRequestDto(name: $request->validated()['name']);
        $author = $this->createAuthorUseCase->execute($requestDto);

        return response()->json([
            'id' => $author->id,
            'name' => $author->name,
            'createdAt' => $author->createdAt,
            'updatedAt' => $author->updatedAt,
        ], 201);
    }
}
