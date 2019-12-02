<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Feature;

use AvtoDev\CloudPayments\Message\Request\TestRequest;
use AvtoDev\CloudPayments\Message\Response\SuccessResponse;

/**
 * @group feature
 * @group test
 *
 * @see   https://developers.cloudpayments.ru/#testovyy-metod
 * @coversNothing
 */
class TestTest extends AbstractFeatureTest
{
    public function test(): void
    {
        $request = TestRequest::create();

        $response = $this->client->send($request);

        $this->assertInstanceOf(SuccessResponse::class, $response);
    }
}
