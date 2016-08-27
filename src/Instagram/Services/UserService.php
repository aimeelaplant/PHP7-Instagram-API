<?php declare(strict_types=1);

namespace laplant\Instagram\Services;

use laplant\Instagram\{
    UrlUtils,
    Clients\InstagramClient,
    Collections\MediaCollection,
    Collections\UserCollection,
    Exceptions\InstagramAPIException,
    Factories\MediaFactory,
    Factories\UserFactory,
    Models\User
};

/**
 * Class UserService
 * @package laplant\Instagram\Services
 */
class UserService extends BaseService
{
    /**
     *
     */
    const ENDPOINT = "/users/";

    /**
     * UserService constructor.
     *
     * @param InstagramClient $client
     */
    public function __construct(InstagramClient $client)
    {
        parent::__construct($client);
    }

    /**
     * @param int $userId
     *
     * @return User
     * @throws InstagramAPIException
     */
    public function getUser(int $userId = 0) : User
    {
        $endpoint = UrlUtils::getIdOrSelfEndpoint(self::ENDPOINT, $userId);
        $params = [
            'client_id'     => $this->client->getClientId(),
            'access_token'  => $this->client->getAccessToken()
        ];
        $response = $this->client->sendRequestWithToken($endpoint, $params);
        $resultArray = $this->client->handleResponse($response);
        if ($this->client->getMeta()->getErrorMessage()) {
            throw new InstagramAPIException($this->client->getMeta());
        }
        $user = UserFactory::createFromData($resultArray);
        return $user;
        
    }

    /**
     * @param int $userId
     * @param int $count
     * @param int $minId
     * @param int $maxId
     *
     * @return MediaCollection
     * @throws InstagramAPIException
     */
    public function getRecentMedia(int $userId = 0, int $count = 0, int $minId = 0, int $maxId = 0) : MediaCollection
    {
        $endpoint = UrlUtils::getIdOrSelfEndpoint(self::ENDPOINT, $userId) . 'media/recent/';
        $params = [
            'client_id'     => $this->client->getClientId(),
            'access_token'  => $this->client->getAccessToken()
        ];
        if ($count > 0) {
            $params['count'] = $count;
        }
        if ($minId > 0) {
            $params['min_id'] = $minId;
        }
        if ($maxId > 0) {
            $params['max_id'] = $maxId;
        }
        $response = $this->client->sendRequestWithToken($endpoint, $params);
        $mediaCollection = new MediaCollection();
        $resultArray = $this->client->handleResponse($response);
        if ($this->client->getMeta()->getErrorMessage()) {
            throw new InstagramAPIException($this->client->getMeta());
        }
        foreach ($resultArray as $data) {
            $media = MediaFactory::createFromData($data);
            $mediaCollection->addItem($media);
        }
        return $mediaCollection;
    }

    /**
     * @param int $count
     * @param int $minId
     * @param int $maxId
     *
     * @return MediaCollection
     * @throws InstagramAPIException
     */
    public function getLikedMedia(int $count = 0, int $minId = 0, int $maxId = 0) : MediaCollection
    {
        $endpoint = '/self/media/liked/';
        $params   = [
            'client_id'    => $this->client->getClientId(),
            'access_token' => $this->client->getAccessToken()
        ];
        if ($count > 0) {
            $params['count'] = $count;
        }
        if ($minId > 0) {
            $params['min_id'] = $minId;
        }
        if ($maxId > 0) {
            $params['max_id'] = $maxId;
        }
        $response        = $this->client->sendRequestWithToken($endpoint, $params);
        $mediaCollection = new MediaCollection();
        $resultArray     = $this->client->handleResponse($response);
        if ($this->client->getMeta()->getErrorMessage()) {
            throw new InstagramAPIException($this->client->getMeta());
        }
        foreach ($resultArray as $data) {
            $media = MediaFactory::createFromData($data);
            $mediaCollection->addItem($media);
        }
        return $mediaCollection;
    }

    /**
     * @param string $query
     * @param int $count
     *
     * @return UserCollection
     * @throws InstagramAPIException
     */
    public function searchUsers(string $query, int $count = 0) : UserCollection
    {
        $endpoint = "/users/search/";
        $params   = [
            'client_id'    => $this->client->getClientId(),
            'access_token' => $this->client->getAccessToken(),
            'query'        => $query
        ];
        if ($count > 0) {
            $params['count'] = $count;
        }
        $response = $this->client->sendRequestWithToken($endpoint, $params);
        $resultArray = $this->client->handleResponse($response);
        if ($this->client->getMeta()->getErrorMessage()) {
            throw new InstagramAPIException($this->client->getMeta());
        }
        $userCollection = new UserCollection();
        foreach ($resultArray as $data) {
            $user = UserFactory::createFromData($data);
            $userCollection->addItem($user);
        }
        return $userCollection;
    }
}
