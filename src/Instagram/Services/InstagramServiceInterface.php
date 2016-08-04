<?php declare(strict_types=1);

namespace laplant\Instagram\Services;

use laplant\Instagram\{
    Enums\RelationshipActions,
    Models\User,
    Models\Media,
    Collections\CommentCollection,
    Collections\MediaCollection,
    Collections\UserCollection
};

interface InstagramServiceInterface
{
    public function getUser(int $userId = 0) : User;
    public function getUserMedia(int $userId = 0, int $count = 0, int $minId = 0, int $maxId = 0) : MediaCollection;
    public function getLikedMedia(int $userId = 0, int $count = 0, int $maxLikeId = 0) : MediaCollection;
    public function searchUsers(string $query, int $count = 0) : UserCollection;

    public function getMedia(int $mediaId = 0) : Media;
    public function getMediaShortCode(string $shortCode) : Media;
    public function searchMedia(string $query) : MediaCollection;

    public function getCommentsCollection(int $mediaId = 0) : CommentCollection;
    public function createComment(int $mediaId, string $text) : InstagramResponse;
    public function deleteComment(int $mediaId, int $commentId) : InstagramResponse;

    public function getFollowedBy() : UserCollection;
    public function getRequestedBy() : UserCollection;
    public function getRelationship(int $userId = 0) : Relationship;
    public function modifyRelationship(int $userId = 0, $action = RelationshipActions::FOLLOW) : Relationship;

    public function getLikes(int $mediaId) : UserCollection;
    public function setLike(int $mediaId) : InstagramResponse;
    public function removeLike(int $mediaId) : InstagramResponse;

    public function getTag(string $tag) : Tag;
    public function getTaggedMedia(string $tag) : MediaCollection;
    public function searchTag(string $query) : TagCollection;

    public function getLocation(int $locationId) : Location;
    public function getMediaFromLocation(int $locationId, int $minId, int $maxId) : MediaCollection;
    public function searchLocation(int $distance = 500, int $lat = 0, int $long = 0) : LocationCollection;
    public function searchLocationViaFacebookPlaces(int $facebookPlacesId) : LocationCollection;
}
