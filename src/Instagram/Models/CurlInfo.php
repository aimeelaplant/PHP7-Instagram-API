<?php declare(strict_types=1);

namespace laplant\Instagram\Models;

/**
 * Class CurlInfo
 * @package laplant\Instagram\Models
 */
class CurlInfo
{
    private $httpCode;
    private $contentType;
    private $effectiveUrl;
    private $body;
    private $headerSize;
    private $requestSize;
    private $sslVerifyResult;
    private $connectTime;
    private $totalTime;
    private $primaryIp;
    private $redirectTime;
    private $redirectUrl;
    private $primaryPort;
    private $localIp;
    private $localPort;

    /**
     * @param string $primaryIp
     *
     * @return $this
     */
    public function setPrimaryIp(string $primaryIp)
    {
        $this->primaryIp = $primaryIp;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrimaryIp() : string
    {
        return $this->primaryIp;
    }

    /**
     * @param float $redirectTime
     *
     * @return $this
     */
    public function setRedirectTime(float $redirectTime)
    {
        $this->redirectTime = $redirectTime;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRedirectTime()
    {
        return $this->redirectTime;
    }

    /**
     * @param string $redirectUrl
     *
     * @return $this
     */
    public function setRedirectUrl(string $redirectUrl)
    {
        $this->redirectUrl = $redirectUrl;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }

    /**
     * @param int $primaryPort
     *
     * @return $this
     */
    public function setPrimaryPort(int $primaryPort)
    {
        $this->primaryPort = $primaryPort;
        return $this;
    }

    /**
     * @return int
     */
    public function getPrimaryPort() : int
    {
        return $this->primaryPort;
    }

    /**
     * @return string
     */
    public function getLocalIp() : string
    {
        return $this->localIp;
    }

    /**
     * @param string $localIp
     *
     * @return $this
     */
    public function setLocalIp(string $localIp)
    {
        $this->localIp = $localIp;
        return $this;
    }

    /**
     * @param int $localPort
     *
     * @return $this
     */
    public function setLocalPort(int $localPort)
    {
        $this->localPort = $localPort;
        return $this;
    }

    /**
     * @return int
     */
    public function getLocalPort() : int
    {
        return $this->localPort;
    }

    /**
     * @param int $size
     *
     * @return $this
     */
    public function setHeaderSize(int $size)
    {
        $this->headerSize = $size;
        return $this;
    }

    /**
     * @return int
     */
    public function getHeaderSize() : int
    {
        return $this->headerSize;
    }

    /**
     * @param int $size
     *
     * @return $this
     */
    public function setRequestSize(int $size)
    {
        $this->requestSize = $size;
        return $this;
    }

    /**
     * @return int
     */
    public function getRequestSize() : int
    {
        return $this->requestSize;
    }

    /**
     * @param int $sslResult
     *
     * @return $this
     */
    public function setSSLVerifyResult(int $sslResult)
    {
        $this->sslVerifyResult = $sslResult;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSSLVerifyResult()
    {
        return $this->sslVerifyResult;
    }

    /**
     * @param float $time
     *
     * @return $this
     */
    public function setConnectTime(float $time)
    {
        $this->connectTime = $time;
        return $this;
    }

    /**
     * @return float
     */
    public function getConnectTime() : float
    {
        return $this->connectTime;
    }

    /**
     * @param float $time
     *
     * @return $this
     */
    public function setTotalTime(float $time)
    {
        $this->totalTime = $time;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalTime() : float
    {
        return $this->totalTime;
    }

    /**
     * @param int $httpCode
     *
     * @return $this
     */
    public function setHttpCode(int $httpCode)
    {
        $this->httpCode = $httpCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getHttpCode() : int
    {
        return $this->httpCode;
    }

    /**
     * @param string $contentType
     *
     * @return $this
     */
    public function setContentType(string $contentType)
    {
        $this->contentType = $contentType;
        return $this;
    }

    /**
     * @return string
     */
    public function getContentType() : string
    {
        return $this->contentType;
    }

    /**
     * @param string $url
     *
     * @return $this
     */
    public function setEffectiveUrl(string $url)
    {
        $this->effectiveUrl = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getEffectiveUrl() : string
    {
        return $this->effectiveUrl;
    }

    /**
     * @param string $body
     *
     * @return $this
     */
    public function setBody(string $body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @return string
     */
    public function getBody() : string
    {
        return $this->body;
    }
}