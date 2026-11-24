<?php

namespace App\Application\Exceptions\Authors;

use RuntimeException;
use Throwable;

class AuthorNotFoundException extends RuntimeException
{
    public function __construct(
        string $message = '著者が見つかりません。',
        ?Throwable $previous = null,
    ) {
        parent::__construct($message, 0, $previous);
    }
}
