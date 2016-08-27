<?php declare(strict_types=1);

namespace laplant\Instagram\Factories;
use laplant\Instagram\Models\Media;

/**
 * Class MediaFactory
 * @package laplant\Instagram\Factories
 */
class MediaFactory
{
    /**
     * @return Media
     */
    public static function create() : Media
    {
        return new Media();
    }

    /**
     * @param array $data
     *
     * @return Media
     */
    public static function createFromData(array $data) : Media
    {
        $media = self::create();

        if (isset($data['data']['type'])) {
            $media->setType($data['data']['type']);
        }
        if (isset($data['data']['users_in_photo'])) {
            $media->setUsersInPhoto($data['data']['users_in_photo']);
        }
        if (isset($data['data']['videos'])) {
            $media->setVideos($data['data']['videos']);
        }
        if (isset($data['data']['filter'])) {
            $media->setFilter($data['data']['filter']);
        }
        if (isset($data['data']['tags'])) {
            $media->setTags($data['data']['tags']);
        }
        if (isset($data['data']['comments'])) {
            $media->setComments($data['data']['comments']);
        }
        if (isset($data['data']['caption'])) {
            $media->setCaption($data['data']['caption']);
        }
        if (isset($data['data']['likes'])) {
            $media->setLikes($data['data']['likes']);
        }
        if (isset($data['data']['link'])) {
            $media->setLink($data['data']['link']);
        }
        if (isset($data['data']['user'])) {
            $media->setUser($data['data']['user']);
        }
        if (isset($data['data']['created_time'])) {
            $media->setCreatedTime($data['data']['created_time']);
        }
        if (isset($data['data']['images'])) {
            $media->setImages($data['data']['images']);
        }
        if (isset($data['data']['id'])) {
            $media->setId((int) $data['data']['id']);
        }
        if (isset($data['data']['location'])) {
            $media->setLocation($data['location']);
        }

        return $media;
    }
}
