<?php declare(strict_types=1);

namespace laplant\Instagram\Clients;

use laplant\Instagram\{
    Enums\RequestTypes,
    Factories\MetaFactory,
    Exceptions\JsonException,
    Exceptions\CurlException,
    Models\Meta,
    Models\Pagination,
    Models\CurlInfo,
    UrlUtils
};

/**
 * Class InstagramClient
 * @package laplant\Instagram\Clients
 */
class InstagramClient
{

    private $clientId;
    private $clientSecret;
    private $redirectUri;
    private $accessToken;
    private $meta;
    private $pagination;
    private $httpResponse;

    /**
     * @param string $clientId
     */
    public function setClientId(string $clientId)
    {
        $this->clientId = $clientId;
    }

    /**
     * @return string
     */
    public function getClientId() : string
    {
        return $this->clientId;
    }

    /**
     * @param string $clientSecret
     */
    public function setClientSecret(string $clientSecret)
    {
        $this->clientSecret = $clientSecret;
    }

    /**
     * @return string
     */
    public function getClientSecret() : string
    {
        return $this->clientSecret;
    }

    /**
     * @param string $redirectUri
     */
    public function setRedirectUri(string $redirectUri)
    {
        $this->redirectUri = $redirectUri;
    }

    /**
     * @return string
     */
    public function getRedirectUri() : string
    {
        return $this->redirectUri;
    }

    /**
     * @param string $accessToken
     */
    public function setAccessToken(string $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @return string
     */
    public function getAccessToken() : string
    {
        return $this->accessToken;
    }

    /**
     * @return CurlInfo
     */
    public function getCurlInfo() : CurlInfo
    {
        return $this->httpResponse;
    }

    /**
     * @return Meta
     */
    public function getMeta() : Meta
    {
        return $this->meta;
    }

    /**
     * @return Pagination
     */
    public function getPagination() : Pagination
    {
        return $this->pagination;
    }

    /**
     * @param CurlInfo $response
     *
     * @return array
     * @throws JsonException
     */
    public function handleResponse(CurlInfo $response) : array
    {
        $this->httpResponse = $response;
        $result = json_decode($response->getBody(), true);
        if (!is_null($result) && is_array($result)) {
            if (isset($result['meta'])) {
                $meta = MetaFactory::createFromData($result);
                $this->meta = $meta;
            }
            if (isset($result['pagination'])) {
                $pagination = new Pagination();
                if (isset($result['pagination']['next_max_id'])) {
                    $pagination->setNextMaxId($result['pagination']['next_max_id']);
                }
                if (isset($result['pagination']['next_url'])) {
                    $pagination->setNextUrl($result['pagination']['next_url']);
                }
                $this->pagination = $pagination;
            }
            return $result;
        } else {
            throw new JsonException(sprintf(
                "Cannot json decode response content. Code: %d, Error: %s",
                json_last_error(),
                json_last_error_msg()
            ));
        }
    }

    /**
     * @param string $endpoint
     * @param array $params
     * @param string $requestType
     *
     * @return CurlInfo
     * @throws CurlException
     */
    public function sendRequestWithToken(string $endpoint, array $params = [], $requestType = RequestTypes::GET) : CurlInfo
    {
        $url = UrlUtils::buildEndpoint($endpoint, $params);
        $httpClient = HttpClient::getInstance();
        $httpParams = array_merge([
            'client_id'     => $this->getClientId(),
            'access_token'  => $this->getAccessToken()
        ], $params);
        
        switch ($requestType) {
            case RequestTypes::GET:
                $response = $httpClient->get($url, $httpParams);
                break;
            case RequestTypes::POST:
                $response = $httpClient->post($url, $httpParams);
                break;
            case RequestTypes::DELETE:
                $response = $httpClient->delete($url, $httpParams);
                break;
        }

        if (isset($response)) {
            return $response;
        }
    }
}
