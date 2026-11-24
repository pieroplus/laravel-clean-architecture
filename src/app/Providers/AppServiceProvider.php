<?php

namespace App\Providers;

use App\Adapters\Utils\GenerateUuid;
use App\Application\UseCases\Authors\CreateAuthorUseCase;
use App\Application\UseCases\Authors\CreateAuthorUseCaseInterface;
use App\Application\UseCases\Authors\FindAllAuthorUseCase;
use App\Application\UseCases\Authors\FindAllAuthorUseCaseInterface;
use App\Application\UseCases\Authors\FindByIdAuthorUseCase;
use App\Application\UseCases\Authors\FindByIdAuthorUseCaseInterface;
use App\Application\Utils\GenerateUuidInterface;
use App\Application\Utils\TransactionManagerInterface;
use App\Domain\Repositories\AuthorRepositoryInterface;
use App\Infrastructure\Repositories\AuthorRepository;
use App\Infrastructure\Transactions\DatabaseTransactionManager;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(GenerateUuidInterface::class, GenerateUuid::class);
        $this->app->bind(TransactionManagerInterface::class, DatabaseTransactionManager::class);
        $this->app->bind(AuthorRepositoryInterface::class, AuthorRepository::class);
        $this->app->bind(CreateAuthorUseCaseInterface::class, CreateAuthorUseCase::class);
        $this->app->bind(FindByIdAuthorUseCaseInterface::class, FindByIdAuthorUseCase::class);
        $this->app->bind(FindAllAuthorUseCaseInterface::class, FindAllAuthorUseCase::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
