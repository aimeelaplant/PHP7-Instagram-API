<?php declare(strict_types = 1);

namespace laplant\Instagram\Models;

class Pagination
{
    private $nextUrl;
    private $nextMaxId;

    public function setNextUrl(string $nextUrl) : self
    {
        $this->nextUrl = $nextUrl;
        return $this;
    }

    public function getNextUrl() : string
    {
        return $this->nextUrl;
    }

    public function setNextMaxId(int $nextMaxId) : self
    {
        $this->nextMaxId = $nextMaxId;
    }

    public function getNextMaxId() : int
    {
        return $this->nextMaxId;
    }
}
