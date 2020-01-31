<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Requests\Subscriptions;

use AvtoDev\CloudPayments\Requests\Subscriptions\SubscriptionsFindRequestBuilder;
use AvtoDev\Tests\Unit\Requests\AbstractRequestBuilderTest;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;

/**
 * @coversDefaultClass \AvtoDev\CloudPayments\Requests\Subscriptions\SubscriptionsFindRequestBuilder
 */
class SubscriptionsFindRequestBuilderTest extends AbstractRequestBuilderTest
{
    /**
     * @var SubscriptionsFindRequestBuilder
     */
    protected $request_builder;

    public function testAccountId()
    {
        $this->assertEmpty($this->request_builder->buildRequest()->getBody()->getContents());
        $this->request_builder->setAccountId('some');
        $this->assertSame('some', $this->request_builder->getAccountId());
        $this->assertSame('{"AccountId":"some"}', $this->request_builder->buildRequest()->getBody()->getContents());
    }

    protected function getRequestBuilder()
    {
        return new SubscriptionsFindRequestBuilder;
    }

    protected function getUri(): UriInterface
    {
        return new Uri('https://api.cloudpayments.ru/subscriptions/find');
    }
}
