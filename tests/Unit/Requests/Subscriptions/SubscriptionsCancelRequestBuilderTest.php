<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Requests\Subscriptions;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use AvtoDev\Tests\Unit\Requests\AbstractRequestBuilderTestCase;
use AvtoDev\CloudPayments\Requests\Subscriptions\SubscriptionsCancelRequestBuilder;

/**
 * @coversDefaultClass \AvtoDev\CloudPayments\Requests\Subscriptions\SubscriptionsCancelRequestBuilder
 */
class SubscriptionsCancelRequestBuilderTest extends AbstractRequestBuilderTestCase
{
    /**
     * @var SubscriptionsCancelRequestBuilder
     */
    protected $request_builder;

    public function testId(): void
    {
        $this->assertEmpty($this->request_builder->buildRequest()->getBody()->getContents());
        $this->request_builder->setId('some');
        $this->assertSame('some', $this->request_builder->getId());
        $this->assertSame('{"Id":"some"}', $this->request_builder->buildRequest()->getBody()->getContents());
    }

    protected function getRequestBuilder(): SubscriptionsCancelRequestBuilder
    {
        return new SubscriptionsCancelRequestBuilder;
    }

    protected function getUri(): UriInterface
    {
        return new Uri('https://api.cloudpayments.ru/subscriptions/cancel');
    }
}
