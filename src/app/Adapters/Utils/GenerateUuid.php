<?php

namespace App\Adapters\Utils;

use App\Application\Utils\GenerateUuidInterface;
use Illuminate\Support\Str;

class GenerateUuid implements GenerateUuidInterface
{
    /**
     * UUID (v7: 時系列順に並ぶ) を生成する
     */
    public function generate(): string
    {
        return (string) Str::uuid7();
    }
}
