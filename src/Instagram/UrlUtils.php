<?php declare(strict_types=1);

namespace laplant\Instagram;

class UrlUtils
{
    public static function buildEndpoint(string $endpoint, array $params = null) : string
    {
        $baseUrl = Config::BASE_URL . $endpoint;
        if (isset($params)) {
            $baseUrl = $baseUrl . "?" . http_build_query($params);
        }
        return $baseUrl;
    }
    
    public static function validateUrl($url) : string
    {
        if (filter_var($url, FILTER_VALIDATE_URL) !== false) {
            return $url;
        } else {
            throw new \InvalidArgumentException("Malformed url: " . $url);
        }
    }

    public static function getIdOrSelfEndpoint($endpoint, int $id = 0) : string
    {
        return $endpoint . ($id == 0 ? 'self/' : $id . '/');
    }
}
