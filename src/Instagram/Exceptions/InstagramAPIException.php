<?php declare(strict_types=1);

namespace laplant\Instagram\Exceptions;

use laplant\Instagram\Models\Meta;

/**
 * Class InstagramAPIException
 * @package laplant\Instagram\Exceptions
 */
class InstagramAPIException extends \Exception
{
    protected $type;

    /**
     * InstagramAPIException constructor.
     *
     * @param Meta $meta
     */
    public function __construct(Meta $meta)
    {
        parent::__construct($meta->getErrorMessage(), $meta->getCode());
    }
}
