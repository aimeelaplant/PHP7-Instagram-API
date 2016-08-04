<?php declare(strict_types=1);

namespace laplant\Instagram\Models;

/**
 * Class Media
 * @package laplant\Instagram\Models
 */
class Media
{
    private $type;
    private $usersInPhoto;
    private $videos;
    private $filter;
    private $tags;
    private $comments;
    private $caption;
    private $likes;
    private $link;
    private $user;
    private $createdTime;
    private $images;
    private $id;
    private $location;

    /**
     * @param string $type
     *
     * @return Media
     */
    public function setType(string $type) : self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getType() : string
    {
        return $this->type;
    }

    /**
     * @param array $usersInPhoto
     *
     * @return Media
     */
    public function setUsersInPhoto(array $usersInPhoto) : self
    {
        $this->usersInPhoto = $usersInPhoto;
        return $this;
    }

    /**
     * @return array
     */
    public function getUsersInPhoto() : array
    {
        return $this->usersInPhoto;
    }

    /**
     * @param array $videos
     *
     * @return Media
     */
    public function setVideos(array $videos) : self
    {
        $this->videos = $videos;
        return $this;
    }

    /**
     * @return array
     */
    public function getVideos() : array
    {
        return $this->videos;
    }

    /**
     * @param string $filter
     *
     * @return Media
     */
    public function setFilter(string $filter) : self
    {
        $this->filter = $filter;
        return $this;
    }

    /**
     * @return string
     */
    public function getFilter() : string
    {
        return $this->filter;
    }

    /**
     * @param array $tags
     *
     * @return Media
     */
    public function setTags(array $tags) : self
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return array
     */
    public function getTags() : array
    {
        return $this->tags;
    }

    /**
     * @param array $comments
     *
     * @return Media
     */
    public function setComments(array $comments) : self
    {
        $this->comments = $comments;
        return $this;
    }

    /**
     * @return array
     */
    public function getComments() : array
    {
        return $this->comments;
    }

    /**
     * @param string $caption
     *
     * @return Media
     */
    public function setCaption(array $caption) : self
    {
        $this->caption = $caption;
        return $this;
    }

    /**
     * @return string
     */
    public function getCaption() : array
    {
        return $this->caption;
    }

    /**
     * @param array $likes
     *
     * @return Media
     */
    public function setLikes(array $likes) : self
    {
        $this->likes = $likes;
        return $this;
    }

    /**
     * @return array
     */
    public function getLikes() : array
    {
        return $this->likes;
    }

    /**
     * @param string $link
     *
     * @return Media
     */
    public function setLink(string $link) : self
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return string
     */
    public function getLink() : string
    {
        return $this->link;
    }

    /**
     * @param array $user
     *
     * @return Media
     */
    public function setUser(array $user) : self
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return array
     */
    public function getUser() : array
    {
        return $this->user;
    }

    /**
     * @param string $createdTime
     *
     * @return Media
     */
    public function setCreatedTime(string $createdTime) : self
    {
        $this->createdTime = $createdTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedTime() : string
    {
        return $this->createdTime;
    }

    /**
     * @param array $images
     *
     * @return Media
     */
    public function setImages(array $images) : self
    {
        $this->images = $images;
        return $this;
    }

    /**
     * @return array
     */
    public function getImages() : array
    {
        return $this->images;
    }

    /**
     * @param int $id
     *
     * @return Media
     */
    public function setId(int $id) : self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @param array $location
     *
     * @return Media
     */
    public function setLocation(array $location) : self
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return array
     */
    public function getLocation() : array
    {
        return $this->location;
    }
}
