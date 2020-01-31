<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Requests\Payments;

use AvtoDev\CloudPayments\Requests\Payments\PaymentsVoidRequestBuilder;
use AvtoDev\Tests\Unit\Requests\AbstractRequestBuilderTest;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;

/**
 * @coversDefaultClass \AvtoDev\CloudPayments\Requests\Payments\PaymentsVoidRequestBuilder
 */
class PaymentsVoidRequestBuilderTest extends AbstractRequestBuilderTest
{
    /**
     * @var PaymentsVoidRequestBuilder
     */
    protected $request_builder;

    public function testTransactionId(): void
    {
        $this->assertSame('', $this->request_builder->buildRequest()->getBody()->getContents());

        $this->request_builder->setTransactionId(1);
        $this->assertSame(1, $this->request_builder->getTransactionId());

        $this->assertSame('{"TransactionId":1}', $this->request_builder->buildRequest()->getBody()->getContents());
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequestBuilder(): PaymentsVoidRequestBuilder
    {
        return new PaymentsVoidRequestBuilder;
    }

    /**
     * {@inheritdoc}
     */
    protected function getUri(): UriInterface
    {
        return new Uri('https://api.cloudpayments.ru/payments/void');
    }
}
