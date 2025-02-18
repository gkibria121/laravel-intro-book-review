<?php

declare(strict_types=1);

use Illuminate\Support\Str;

function snakeToTitleCase(string $ttile): string
{
    return Str::title(str_replace('_', ' ', $ttile));
}


function any(string $field, array $array): mixed
{
    return $array[$field] ?? null;
}
