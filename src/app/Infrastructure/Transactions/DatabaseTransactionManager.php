<?php

namespace App\Infrastructure\Transactions;

use App\Application\Utils\TransactionManagerInterface;
use Illuminate\Support\Facades\DB;
use Override;

class DatabaseTransactionManager implements TransactionManagerInterface
{
    #[Override]
    public function transaction(callable $callback): mixed
    {
        return DB::transaction($callback);
    }
}
