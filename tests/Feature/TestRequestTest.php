<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Feature;

use Tarampampam\Wrappers\Json;
use AvtoDev\CloudPayments\Requests\TestRequestBuilder;

/**
 * @coversNothing
 */
class TestRequestTest extends AbstractFeatureTestCase
{
    public function testIdempotenceTest(): void
    {
        $request = new TestRequestBuilder;

        $request->setRequestId('some');

        $response = $this->cloud_payments_client->send($request->buildRequest());

        $message = Json::decode($response->getBody()->getContents())['Message'];

        $response = $this->cloud_payments_client->send($request->buildRequest());

        $this->assertSame($message, Json::decode($response->getBody()->getContents())['Message']);
    }
}
