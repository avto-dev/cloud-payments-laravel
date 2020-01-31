<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Requests;

use AvtoDev\CloudPayments\Requests\TestRequestBuilder;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;

/**
 * @coversDefaultClass \AvtoDev\CloudPayments\Requests\TestRequestBuilder
 */
class TestRequestBuilderTest extends AbstractRequestBuilderTest
{
    /**
     * @var TestRequestBuilder
     */
    protected $request_builder;

    public function testBody(): void
    {
        $this->assertEmpty($this->request_builder->buildRequest()->getBody()->getContents());
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequestBuilder(): TestRequestBuilder
    {
        return new TestRequestBuilder;
    }

    /**
     * {@inheritdoc}
     */
    protected function getUri(): UriInterface
    {
        return new Uri('https://api.cloudpayments.ru/test');
    }
}
