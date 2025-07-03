<?php

declare(strict_types = 1);

namespace Unit\Requests\ApplePay;

use GuzzleHttp\Psr7\Uri;
use Illuminate\Support\Str;
use Psr\Http\Message\UriInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use AvtoDev\Tests\Unit\Requests\AbstractRequestBuilderTestCase;
use AvtoDev\CloudPayments\Requests\ApplePay\ApplePayStartSessionRequestBuilder;

#[CoversClass(ApplePayStartSessionRequestBuilder::class)]
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
            \json_encode(['ValidationUrl' => $validation_uri]),
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
