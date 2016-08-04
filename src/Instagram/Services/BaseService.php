<?php declare(strict_types=1);

namespace laplant\Instagram\Services;

use laplant\Instagram\Clients\InstagramClient;

/**
 * Class BaseService
 * @package laplant\Instagram\Services
 */
abstract class BaseService
{
    protected $client;

    /**
     * BaseService constructor.
     *
     * @param InstagramClient $client
     */
    public function __construct(InstagramClient $client)
    {
        $this->client = $client;
    }
}