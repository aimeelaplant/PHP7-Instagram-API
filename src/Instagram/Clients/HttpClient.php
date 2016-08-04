<?php declare(strict_types=1);

namespace laplant\Instagram\Clients;

use laplant\Instagram\{
    Factories\CurlInfoFactory,
    Exceptions\CurlException,
    Models\CurlInfo
};

/**
 * Class HttpClient
 * @package laplant\Instagram\Clients
 */
class HttpClient implements RequestMethodsInterface
{

    private static $instance;
    private $handle;

    /**
     * @return HttpClient
     */
    public static function getInstance() : self
    {
        if (is_null(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    /**
     * @return array
     */
    public static function getDefaultOptions()
    {
        return [
            \CURLOPT_RETURNTRANSFER  => true,
            \CURLOPT_HEADER          => false,
            \CURLOPT_FOLLOWLOCATION  => true,
        ];
    }

    /**
     * @return resource
     */
    public function getHandle()
    {
        if (is_null($this->handle)) {
            $this->handle = curl_init();
            return $this->handle;
        } else {
            return $this->handle;
        }
    }

    /**
     * @param string $url
     * @param array|null $params
     *
     * @return CurlInfo
     * @throws CurlException
     */
    public function get(string $url, array $params = null) : CurlInfo
    {
        $handle = $this->getHandle();
        $opts = self::getDefaultOptions();
        $opts[\CURLOPT_URL] = $url;
        curl_setopt_array($handle, $opts);
        $result = curl_exec($handle);
        $info = curl_getinfo($handle);
        if ($result !== false) {
            $httpResponse = CurlInfoFactory::createWithData($info, $result);
            return $httpResponse;
        } else {
            throw new CurlException(sprintf(
                "Can't get response. Curl error number: %d. Message: %s",
                curl_errno($handle),
                curl_error($handle)
            ));
        }
    }

    /**
     * @param string $url
     * @param array|null $params
     *
     * @return CurlInfo
     * @throws CurlException
     */
    public function post(string $url, array $params = null) : CurlInfo
    {
        $handle = $this->getHandle();
        $opts = self::getDefaultOptions();
        $opts[\CURLOPT_URL] = $url;
        $opts[\CURLOPT_CUSTOMREQUEST] = "POST";
        curl_setopt_array($handle, $opts);
        $result = curl_exec($handle);
        $info = curl_getinfo($handle);
        if ($result !== false) {
            $httpResponse = CurlInfoFactory::createWithData($info, $result);
            return $httpResponse;
        } else {
            throw new CurlException(sprintf(
                "Can't get response. Curl error number: %d. Message: %s",
                curl_errno($handle),
                curl_error($handle)
            ));
        }
    }


    /**
     * @param string $url
     * @param array|null $params
     *
     * @return CurlInfo
     * @throws CurlException
     */
    public function delete(string $url, array $params = null) : CurlInfo
    {
        $handle = $this->getHandle();
        $opts = self::getDefaultOptions();
        $opts[\CURLOPT_URL] = $url;
        $opts[\CURLOPT_CUSTOMREQUEST] = "DELETE";
        curl_setopt_array($handle, $opts);
        $result = curl_exec($handle);
        $info = curl_getinfo($handle);
        if ($result !== false) {
            $httpResponse = CurlInfoFactory::createWithData($info, $result);
            return $httpResponse;
        } else {
            throw new CurlException(sprintf(
                "Can't get response. Curl error number: %d. Message: %s",
                curl_errno($handle),
                curl_error($handle)
            ));
        }
    }


    /**
     *
     */
    public function __destruct()
    {
        if (is_resource($this->getHandle())) {
            curl_close($this->getHandle());
        }
    }
}
