<?php
namespace laplant\Instagram\Factories;

use laplant\Instagram\Models\CurlInfo;

/**
 * Class CurlInfoFactory
 * @package laplant\Instagram\Factories
 */
class CurlInfoFactory
{
    /**
     * @return CurlInfo
     */
    public static function create()
    {
        return new CurlInfo();
    }

    /**
     * @param array $info
     * @param string $curlResult
     *
     * @return CurlInfo
     */
    public static function createWithData(array $info, string $curlResult)
    {
        $httpResponse = self::create();
        $httpResponse
            ->setContentType($info['content_type'])
            ->setHttpCode($info['http_code'])
            ->setEffectiveUrl($info['url'])
            ->setHeaderSize($info['header_size'])
            ->setRequestSize($info['request_size'])
            ->setSSLVerifyResult($info['ssl_verify_result'])
            ->setRedirectTime($info['redirect_time'])
            ->setConnectTime($info['connect_time'])
            ->setTotalTime($info['total_time'])
            ->setPrimaryIp($info['primary_ip'])
            ->setRedirectUrl($info['redirect_url'] ?? '')
            ->setPrimaryIp($info['primary_ip'])
            ->setPrimaryPort($info['primary_port'])
            ->setLocalIp($info['local_ip'])
            ->setLocalPort($info['local_port'])
            ->setBody($curlResult);
        return $httpResponse;
    }
}