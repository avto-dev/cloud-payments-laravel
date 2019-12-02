<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Feature;

use AvtoDev\CloudPayments\Client\Client;
use AvtoDev\CloudPayments\Client\Exception\InvalidHttpResponseCodeException;
use AvtoDev\CloudPayments\Message\Request\TestRequest;
use GuzzleHttp\Client as GuzzleHttpClient;
use PHPUnit\Framework\TestCase;

/**
 * @group feature
 * @group error-auth
 *
 * @see   https://developers.cloudpayments.ru/#autentifikatsiya-zaprosov
 * @coversNothing
 */
class ErrorAuthTest extends TestCase
{
    public function test(): void
    {
        $client = new Client(
            new GuzzleHttpClient,
            '',
            ''
        );

        $request = TestRequest::create();

        $this->expectException(InvalidHttpResponseCodeException::class);

        $client->send($request);
    }
}
