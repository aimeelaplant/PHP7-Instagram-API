<?php declare(strict_types=1);

namespace laplant\Instagram\Services;

use laplant\Instagram\Models\User;
use laplant\Instagram\Collections\{UserCollection, MediaCollection};

interface UserServiceInterface
{
    public function getUser(int $userId = 0) : User;
    public function getRecentMedia(int $userId = 0, int $count = 0, int $minId = 0, int $maxId = 0) : MediaCollection;
    public function getLikedMedia(int $userId = 0, int $count = 0, int $maxLikeId = 0) : MediaCollection;
    public function searchUsers(string $query, int $count = 0) : UserCollection;
}