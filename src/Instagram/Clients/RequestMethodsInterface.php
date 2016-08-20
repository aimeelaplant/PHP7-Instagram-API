<?php declare(strict_types=1);

namespace laplant\Instagram\Clients;

/**
 * Interface RequestMethodsInterface
 * @package laplant\Instagram\Client
 */
interface RequestMethodsInterface
{
    const GET = "GET";
    const POST = "POST";
    const DELETE = "DELETE";

    /**
     * @param string $endpoint
     * @param array|null $params
     *
     * @return mixed
     */
    public static function get(string $endpoint, array $params = null);

    /**
     * @param string $endpoint
     * @param array $params
     *
     * @return mixed
     */
    public static function post(string $endpoint, array $params);

    /**
     * @param string $endpoint
     * @param array $params
     *
     * @return mixed
     */
    public static function delete(string $endpoint, array $params);
}