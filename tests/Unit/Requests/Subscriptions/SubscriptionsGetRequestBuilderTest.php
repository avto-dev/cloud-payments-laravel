<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Requests\Subscriptions;

use AvtoDev\CloudPayments\Requests\Subscriptions\SubscriptionsGetRequestBuilder;
use AvtoDev\Tests\Unit\Requests\AbstractRequestBuilderTest;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;

/**
 * @coversDefaultClass \AvtoDev\CloudPayments\Requests\Subscriptions\SubscriptionsGetRequestBuilder
 */
class SubscriptionsGetRequestBuilderTest extends AbstractRequestBuilderTest
{
    /**
     * @var SubscriptionsGetRequestBuilder
     */
    protected $request_builder;

    public function testId()
    {
        $this->assertEmpty($this->request_builder->buildRequest()->getBody()->getContents());
        $this->request_builder->setId('some');
        $this->assertSame('some', $this->request_builder->getId());
        $this->assertSame('{"Id":"some"}', $this->request_builder->buildRequest()->getBody()->getContents());
    }

    protected function getRequestBuilder(): SubscriptionsGetRequestBuilder
    {
        return new SubscriptionsGetRequestBuilder;
    }

    protected function getUri(): UriInterface
    {
        return new Uri('https://api.cloudpayments.ru/subscriptions/get');
    }
}
