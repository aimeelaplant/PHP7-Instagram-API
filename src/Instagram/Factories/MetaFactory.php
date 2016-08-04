<?php declare(strict_types=1);

namespace laplant\Instagram\Factories;

use laplant\Instagram\Models\Meta;

class MetaFactory
{
    public static function create() : Meta
    {
        return new Meta();
    }

    public static function createFromData(array $data) : Meta
    {
        $meta = self::create();
        $meta->setCode($data['meta']['code'] ?? 0);
        $meta->setErrorMessage($data['meta']['error_message'] ?? '');
        $meta->setErrorType($data['meta']['error_type'] ?? '');
        return $meta;
    }
}
