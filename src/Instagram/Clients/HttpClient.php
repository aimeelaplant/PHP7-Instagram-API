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
     * @param string $url
     * @param array|null $params
     *
     * @return CurlInfo
     * @throws CurlException
     */
    public function get(string $url, array $params = null) : CurlInfo
    {
        $handle = curl_init();
        $opts = self::getDefaultOptions();
        $opts[\CURLOPT_URL] = $url;
        curl_setopt_array($handle, $opts);
        $result = curl_exec($handle);
        $info = curl_getinfo($handle);
        curl_close($handle);
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
        $handle = curl_init();
        $opts = self::getDefaultOptions();
        $opts[\CURLOPT_URL] = $url;
        $opts[\CURLOPT_CUSTOMREQUEST] = "POST";
        curl_setopt_array($handle, $opts);
        $result = curl_exec($handle);
        $info = curl_getinfo($handle);
        curl_close($handle);
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
        $handle = curl_init();
        $opts = self::getDefaultOptions();
        $opts[\CURLOPT_URL] = $url;
        $opts[\CURLOPT_CUSTOMREQUEST] = "DELETE";
        curl_setopt_array($handle, $opts);
        $result = curl_exec($handle);
        $info = curl_getinfo($handle);
        curl_close($handle);
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

}
