<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Requests\Payments\SBP;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use AvtoDev\Tests\Unit\Requests\AbstractRequestBuilderTestCase;
use AvtoDev\CloudPayments\Requests\Payments\SBP\SBPGetPaymentStatusRequestBuilder;

/**
 * @covers \AvtoDev\CloudPayments\Requests\Payments\SBP\SBPGetPaymentStatusRequestBuilder
 */
class SBPGetPaymentStatusRequestBuilderTest extends AbstractRequestBuilderTestCase
{
    /**
     * @var SBPGetPaymentStatusRequestBuilder
     */
    protected $request_builder;

    public function testTransactionId(): void
    {
        $this->request_builder->setTransactionId(1);

        $data = \json_decode($this->request_builder->buildRequest()->getBody()->getContents(), true);

        $this->assertArrayHasKey('TransactionId', $data);
        $this->assertSame(1, $data['TransactionId']);
    }

    /**
     * @inheritdoc
     */
    protected function getRequestBuilder(): SBPGetPaymentStatusRequestBuilder
    {
        return new SBPGetPaymentStatusRequestBuilder();
    }

    /**
     * @inheritdoc
     */
    protected function getUri(): UriInterface
    {
        return new Uri('https://api.cloudpayments.ru/payments/qr/status/get');
    }
}
