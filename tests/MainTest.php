<?php

namespace TFASoft\Tests;

use PHPUnit\Framework\TestCase;
use Dotenv\Dotenv;
use TFASoft\TFA;

final class MainTest extends TestCase
{
    public function test_config()
    {
        $tfa = new TFA('token');
        $this->assertEquals('token', $tfa->getAccessToken());

        $tfa = new TFA('token', 'http://test/api/');
        $this->assertEquals('http://test/api/', $tfa->getBaseUrl());
    }

    public function test_auth_user()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
        $dotenv->safeLoad();
        $accessToken = $_ENV['TEST_ACCESS_TOKEN'];
        $userToken = $_ENV['TEST_USER_TOKEN'];

        $tfa = new TFA($accessToken);

        $result = $tfa->authUser($userToken);

        $this->assertTrue(isset($result['status']));
        $this->assertTrue(isset($result['data']));
    }
}
