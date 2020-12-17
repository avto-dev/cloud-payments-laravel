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
 * @covers \AvtoDev\CloudPayments\Requests\ApplePay\ApplePayStartSessionRequestBuilder
 */
class ApplePayStartSessionRequestBuilderTest extends AbstractRequestBuilderTestCase
{
    /**
     * @var ApplePayStartSessionRequestBuilder
     */
    protected $request_builder;

    public function testSetValidationUrl(): void
    {
        $request_builder = $this->getRequestBuilder();
        $request_builder->setValidationUrl($validation_uri = Str::random());

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
