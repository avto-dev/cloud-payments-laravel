<?php

declare(strict_types = 1);

namespace Unit\Requests\Payments;

use GuzzleHttp\Psr7\Uri;
use Tarampampam\Wrappers\Json;
use Psr\Http\Message\UriInterface;
use AvtoDev\Tests\Unit\Requests\AbstractRequestBuilderTestCase;
use AvtoDev\CloudPayments\Requests\Payments\PaymentsConfirmRequestBuilder;

/**
 * @coversDefaultClass \AvtoDev\CloudPayments\Requests\Payments\PaymentsConfirmRequestBuilder
 */
class PaymentsConfirmRequestBuilderTest extends AbstractRequestBuilderTestCase
{
    /**
     * @var PaymentsConfirmRequestBuilder
     */
    protected $request_builder;

    public function testTransactionId(): void
    {
        $this->assertEmpty($this->request_builder->buildRequest()->getBody()->getContents());

        $this->request_builder->setTransactionId(123);

        $data = Json::decode($this->request_builder->buildRequest()->getBody()->getContents());

        $this->assertArrayHasKey('TransactionId', $data);
        $this->assertSame(123, $data['TransactionId']);
    }

    public function testAmount(): void
    {
        $this->request_builder->setAmount(32.1);

        $data = Json::decode($this->request_builder->buildRequest()->getBody()->getContents());

        $this->assertArrayHasKey('Amount', $data);
        $this->assertSame(32.1, $data['Amount']);
    }

    public function testJsonData(): void
    {
        $this->request_builder->setJsonData(['some']);

        $data = Json::decode($this->request_builder->buildRequest()->getBody()->getContents());

        $this->assertArrayHasKey('JsonData', $data);
        $this->assertSame('["some"]', $data['JsonData']);
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequestBuilder(): PaymentsConfirmRequestBuilder
    {
        return new PaymentsConfirmRequestBuilder;
    }

    /**
     * {@inheritdoc}
     */
    protected function getUri(): UriInterface
    {
        return new Uri('https://api.cloudpayments.ru/payments/confirm');
    }
}
