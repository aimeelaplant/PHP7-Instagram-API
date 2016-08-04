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

        if (isset($data['type'])) {
            $media->setType($data['type']);
        }
        if (isset($data['users_in_photo'])) {
            $media->setUsersInPhoto($data['users_in_photo']);
        }
        if (isset($data['videos'])) {
            $media->setVideos($data['videos']);
        }
        if (isset($data['filter'])) {
            $media->setFilter($data['filter']);
        }
        if (isset($data['tags'])) {
            $media->setTags($data['tags']);
        }
        if (isset($data['comments'])) {
            $media->setComments($data['comments']);
        }
        if (isset($data['caption'])) {
            $media->setCaption($data['caption']);
        }
        if (isset($data['likes'])) {
            $media->setLikes($data['likes']);
        }
        if (isset($data['link'])) {
            $media->setLink($data['link']);
        }
        if (isset($data['user'])) {
            $media->setUser($data['user']);
        }
        if (isset($data['created_time'])) {
            $media->setCreatedTime($data['created_time']);
        }
        if (isset($data['images'])) {
            $media->setImages($data['images']);
        }
        if (isset($data['id'])) {
            $media->setId((int) $data['id']);
        }
        if (isset($data['location'])) {
            $media->setLocation($data['location']);
        }

        return $media;
    }
}
