<?php declare(strict_types=1);

namespace laplant\Instagram;

class Config
{
    const BASE_URL = "https://api.instagram.com/v1";
    const OAUTH_URL = self::BASE_URL . "/oauth/authorize";
}