<?php

declare(strict_types = 1);

namespace Unit\Requests\ApplePay;

use GuzzleHttp\Psr7\Uri;
use Illuminate\Support\Str;
use Tarampampam\Wrappers\Json;
use Psr\Http\Message\UriInterface;
use AvtoDev\Tests\Unit\Requests\AbstractRequestBuilderTestCase;
use AvtoDev\CloudPayments\Requests\ApplePay\ApplePayStartSessionRequestBuilder;

/**
 * @coversDefaultClass \AvtoDev\CloudPayments\Requests\ApplePay\ApplePayStartSessionRequestBuilder
 */
class ApplePayStartSessionRequestBuilderTest extends AbstractRequestBuilderTestCase
{
    /**
     * @var ApplePayStartSessionRequestBuilder
     */
    protected $request_builder;

    /**
     * @covers ::getRequestPayload
     * @covers ::getValidationUrl
     * @covers ::setValidationUrl
     */
    public function testGetters(): void
    {
        $request_builder = $this->getRequestBuilder();
        $request_builder->setValidationUrl($validation_uri = Str::random());
        $this->assertSame($validation_uri, $request_builder->getValidationUrl());

        $request = $request_builder->buildRequest();

        $this->assertJsonStringEqualsJsonString(
            Json::encode(['ValidationUrl' => $validation_uri]),
            $request->getBody()->getContents()
        );
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequestBuilder(): ApplePayStartSessionRequestBuilder
    {
        return new ApplePayStartSessionRequestBuilder;
    }

    protected function getUri(): UriInterface
    {
        return new Uri('https://api.cloudpayments.ru/applepay/startsession');
    }
}
