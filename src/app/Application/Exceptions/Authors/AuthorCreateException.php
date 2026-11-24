<?php

namespace App\Application\Exceptions\Authors;

use RuntimeException;
use Throwable;

class AuthorCreateException extends RuntimeException
{
    public function __construct(
        string $message = '著者の登録に失敗しました。',
        ?Throwable $previous = null,
    ) {
        parent::__construct($message, 0, $previous);
    }
}
