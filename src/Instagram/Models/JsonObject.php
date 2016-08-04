<?php declare(strict_types=1);

namespace laplant\Instagram\Models;

class JsonObject
{
    private $jsonData;

    public function __construct($jsonData)
    {
        $this->jsonData = $jsonData;
    }
    
    public function getJsonData()
    {
        return $this->jsonData;
    }
}
