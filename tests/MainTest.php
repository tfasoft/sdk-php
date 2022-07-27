<?php

namespace TFASoft\Tests;

use PHPUnit\Framework\TestCase;
use Dotenv\Dotenv;
use TFASoft\TFA;

final class MainTest extends TestCase
{
    public function test_config()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
        $dotenv->safeLoad();
        $accessToken = $_ENV['TEST_ACCESS_TOKEN'];
        $userToken = $_ENV['TEST_USER_TOKEN'];

        $tfa = new TFA($accessToken);
        $this->assertEquals($accessToken, $tfa->getAccessToken());

        $tfa = new TFA($accessToken, 'http://test/api/');
        $this->assertEquals('http://test/api/', $tfa->getBaseUrl());
    }
}
