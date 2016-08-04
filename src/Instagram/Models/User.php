<?php declare(strict_types=1);

namespace laplant\Instagram\Models;

use laplant\Instagram\Models\BaseModel;

class User
{
    private $id;
    private $username;
    private $fullName;
    private $profilePicture;
    private $bio;
    private $website;
    private $counts;

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    public function getUsername() : string
    {
        return $this->username;
    }

    public function setFullName(string $fullName)
    {
        $this->fullName = $fullName;
    }

    public function getFullName() : string
    {
        return $this->fullName;
    }

    public function setProfilePicture(string $profilePicture)
    {
        $this->profilePicture = $profilePicture;
    }

    public function getProfilePicture() : string
    {
        return $this->profilePicture;
    }

    public function setBio(string $bio)
    {
        $this->bio = $bio;
    }

    public function getBio() : string
    {
        return $this->bio;
    }

    public function setWebsite(string $website)
    {
        $this->website = $website;
    }

    public function getWebsite() :  string
    {
        return $this->website;
    }

    public function setCounts(array $counts)
    {
        $this->counts = $counts;
    }

    public function getCounts() : array
    {
        return $this->counts;
    }

    public function jsonSerialize()
    {
        return [
           "id"                 => $this->id,
           "username"           => $this->username,
           "full_name"          => $this->fullName,
           "profile_picture"    => $this->profilePicture,
           "bio"                => $this->bio,
           "website"            => $this->website,
           "counts"             => $this->counts
        ];
    }
}