<?php

namespace AvtoDev\Tests\Feature;

use AvtoDev\CloudPayments\Requests\TestRequestBuilder;
use AvtoDev\CloudPayments\ResponseParser;

/**
 * @coversNothing
 */
class TestRequestTest extends AbstractFeatureTestCase
{
    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Tarampampam\Wrappers\Exceptions\JsonEncodeDecodeException
     */
    public function testIdempotenceTest(): void
    {
        $request = new TestRequestBuilder;

        $request->setRequestId('some');

        $response = $this->cloud_payments_client->send($request->buildRequest());

        $message = ResponseParser::parseSimpleResponse($response)->getMessage();

        $response = $this->cloud_payments_client->send($request->buildRequest());

        $this->assertSame($message, ResponseParser::parseSimpleResponse($response)->getMessage());
    }
}
