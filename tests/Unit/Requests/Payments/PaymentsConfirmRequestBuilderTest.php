<?php

declare(strict_types = 1);

namespace Unit\Requests\Payments;

use AvtoDev\CloudPayments\Requests\Payments\PaymentsConfirmRequestBuilder;
use AvtoDev\Tests\Unit\Requests\AbstractRequestBuilderTest;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use Tarampampam\Wrappers\Json;

/**
 * @coversDefaultClass \AvtoDev\CloudPayments\Requests\Payments\PaymentsConfirmRequestBuilder
 */
class PaymentsConfirmRequestBuilderTest extends AbstractRequestBuilderTest
{
    /**
     * @var PaymentsConfirmRequestBuilder
     */
    protected $request_builder;

    public function testFields(): void
    {
        $this->assertEmpty($this->request_builder->buildRequest()->getBody()->getContents());

        $this->request_builder->setTransactionId(123);
        $this->assertSame(123, $this->request_builder->getTransactionId());

        $data = Json::decode($this->request_builder->buildRequest()->getBody()->getContents());

        $this->assertArrayHasKey('TransactionId', $data);
        $this->assertSame(123, $data['TransactionId']);

        $this->request_builder->setAmount(32.1);
        $this->assertSame(32.1, $this->request_builder->getAmount());

        $data = Json::decode($this->request_builder->buildRequest()->getBody()->getContents());

        $this->assertArrayHasKey('Amount', $data);
        $this->assertSame(32.1, $data['Amount']);

        $this->request_builder->setJsonData(['some']);
        $this->assertSame(['some'], $this->request_builder->getJsonData());

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
