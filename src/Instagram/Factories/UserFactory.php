<?php declare(strict_types=1);

namespace laplant\Instagram\Factories;
use laplant\Instagram\Models\User;

class UserFactory
{
 
    public static function create()
    {
        return new User();
    }

    public static function createFromData($data) : User
    {
        $user = self::create();
        if (isset($data['data'])) {
            if (isset($data['data']['username'])) {
                $user->setUsername($data['data']['username']);
            }
            if (isset($data['data']['id'])) {
                $user->setId((int) $data['data']['id']);
            }
            if (isset($data['data']['bio'])) {
                $user->setBio($data['data']['bio']);
            }
            if (isset($data['data']['counts'])) {
                $user->setCounts($data['data']['counts']);
            }
            if (isset($data['data']['full_name'])) {
                $user->setFullName($data['data']['full_name']);
            }
            if (isset($data['data']['profile_picture'])) {
                $user->setProfilePicture($data['data']['profile_picture']);
            }
            if (isset($data['data']['website'])) {
                $user->setWebsite($data['data']['website']);
            }
        }
        return $user;
    }
}