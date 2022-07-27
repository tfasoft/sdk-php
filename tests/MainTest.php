<?php

namespace TFASoft\Tests;

use PHPUnit\Framework\TestCase;
use Dotenv\Dotenv;
use TFASoft\TFA;

final class MainTest extends TestCase
{
    public function test_tfa()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
        $dotenv->safeLoad();
        $accessToken = $_ENV['TEST_ACCESS_TOKEN'];
        $userToken = $_ENV['TEST_USER_TOKEN'];

        $tfa = new TFA($accessToken);
    }
}
