<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Requests\Payments\Cards;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use AvtoDev\Tests\Unit\Requests\AbstractRequestBuilderTestCase;
use AvtoDev\CloudPayments\Requests\Payments\Cards\CardsPost3DsRequestBuilder;

/**
 * @covers \AvtoDev\CloudPayments\Requests\Payments\Cards\CardsPost3DsRequestBuilder
 */
class CardsPost3DsRequestBuilderTest extends AbstractRequestBuilderTestCase
{
    /**
     * @var CardsPost3DsRequestBuilder
     */
    protected $request_builder;

    public function testTransactionId(): void
    {
        $this->assertSame('', $this->request_builder->buildRequest()->getBody()->getContents());

        $this->request_builder->setTransactionId(1);

        $this->assertSame('{"TransactionId":1}', $this->request_builder->buildRequest()->getBody()->getContents());
    }

    public function testPaRes(): void
    {
        $this->assertSame('', $this->request_builder->buildRequest()->getBody()->getContents());

        $this->request_builder->setPaRes('some');

        $this->assertSame('{"PaRes":"some"}', $this->request_builder->buildRequest()->getBody()->getContents());
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequestBuilder(): CardsPost3DsRequestBuilder
    {
        return new CardsPost3DsRequestBuilder;
    }

    /**
     * {@inheritdoc}
     */
    protected function getUri(): UriInterface
    {
        return new Uri('https://api.cloudpayments.ru/payments/cards/post3ds');
    }
}
