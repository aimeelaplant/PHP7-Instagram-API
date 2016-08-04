<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aimee LaPlant
 * Date: 7/18/16
 * Time: 4:00 PM
 */

namespace laplant\Instagram\Models;

class Meta implements \JsonSerializable
{
    private $errorType;
    private $code;
    private $errorMessage;

    public function setErrorType(string $errorType) : self
    {
        $this->errorType = $errorType;
        return $this;
    }

    public function getErrorType() : string
    {
        return $this->errorType;
    }

    public function setCode(int $code) : self
    {
        $this->code = $code;
        return $this;
    }

    public function getCode() : int
    {
        return $this->code;
    }

    public function setErrorMessage(string $errorMessage) : self
    {
        $this->errorMessage = $errorMessage;
        return $this;
    }

    public function getErrorMessage() : string
    {
        return $this->errorMessage;
    }

    public function jsonSerialize()
    {
        return [
            "error_type"      => $this->errorType,
            "code"            => $this->code,
            "error_message"   => $this->errorMessage
        ];
    }
}