<?php
namespace laplant\Instagram\Tests;

use laplant\Instagram\Clients\InstagramClient;
use laplant\Instagram\Models\CurlInfo;
use laplant\Instagram\Models\User;
use laplant\Instagram\Services\UserService;

/**
 * Class UserServiceTests
 * @package laplant\Instagram\Tests
 */
class UserServiceTests extends \PHPUnit_Framework_TestCase
{
    /**
     * @throws \laplant\Instagram\Exceptions\InstagramAPIException
     */
    public function testGetUsers()
    {
        $class = InstagramClient::class;
        $mockClient = $this->getMockBuilder($class)
                            ->setMethods(['sendRequestWithToken', 'getClientId', 'getAccessToken'])
                            ->getMock();
        $mockClient->expects($this->once())
                    ->method('sendRequestWithToken')
                    ->willReturn($this->getUserDataProvider());
        $mockClient->expects($this->once())
                   ->method('getClientId')
                   ->willReturn(1);
        $mockClient->expects($this->once())
                   ->method('getAccessToken')
                   ->willReturn('1a');

        $userService = new UserService($mockClient);
        $user = $userService->getUser();

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($user->getUsername(), 'aimeelaplant');
    }

    /**
     * @return CurlInfo
     */
    public function getUserDataProvider()
    {
        $curlInfo = new CurlInfo();
        $body = "{\"meta\": {\"code\": 200}, \"data\": {\"username\": \"aimeelaplant\", \"bio\": \"\ud83d\udc81\ud83c\udffb is Aimee. \ud83d\udc37 is Molley. \ud83d\udc36 is Murphy.\", \"website\": \"\", \"profile_picture\": \"https://scontent.cdninstagram.com/t51.2885-19/10735529_805570739466238_1098440261_a.jpg\", \"full_name\": \"Aimee, Molley \u0026 Murphy\", \"counts\": {\"media\": 118, \"followed_by\": 630, \"follows\": 555}, \"id\": \"42934359\"}}";
        $curlInfo->setBody($body);
        return $curlInfo;
    }
}