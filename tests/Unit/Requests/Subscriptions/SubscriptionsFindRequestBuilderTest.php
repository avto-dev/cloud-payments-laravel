<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Requests\Subscriptions;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use AvtoDev\Tests\Unit\Requests\AbstractRequestBuilderTestCase;
use AvtoDev\CloudPayments\Requests\Subscriptions\SubscriptionsFindRequestBuilder;

/**
 * @coversDefaultClass \AvtoDev\CloudPayments\Requests\Subscriptions\SubscriptionsFindRequestBuilder
 */
class SubscriptionsFindRequestBuilderTest extends AbstractRequestBuilderTestCase
{
    /**
     * @var SubscriptionsFindRequestBuilder
     */
    protected $request_builder;

    public function testAccountId(): void
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
