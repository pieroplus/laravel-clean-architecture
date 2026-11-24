<?php

namespace App\Application\Utils;

interface TransactionManagerInterface
{
    public function transaction(callable $callback): mixed;
}
