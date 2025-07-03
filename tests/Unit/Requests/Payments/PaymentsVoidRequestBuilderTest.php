<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Requests\Payments;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use AvtoDev\Tests\Unit\Requests\AbstractRequestBuilderTestCase;
use AvtoDev\CloudPayments\Requests\Payments\PaymentsVoidRequestBuilder;

#[CoversClass(PaymentsVoidRequestBuilder::class)]
class PaymentsVoidRequestBuilderTest extends AbstractRequestBuilderTestCase
{
    /**
     * @var PaymentsVoidRequestBuilder
     */
    protected $request_builder;

    public function testTransactionId(): void
    {
        $this->assertSame('', $this->request_builder->buildRequest()->getBody()->getContents());

        $this->request_builder->setTransactionId(1);

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
