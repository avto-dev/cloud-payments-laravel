<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Requests\Payments\Cards;

use AvtoDev\CloudPayments\Requests\Payments\Cards\CardsAuthRequestBuilder;
use AvtoDev\Tests\Unit\Requests\AbstractRequestBuilderTest;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;

/**
 * @coversDefaultClass \AvtoDev\CloudPayments\Requests\Payments\Cards\CardsAuthRequestBuilder
 */
class CardsAuthRequestBuilderTest extends AbstractRequestBuilderTest
{
    /**
     * @var CardsAuthRequestBuilder
     */
    protected $request_builder;

    public function testName(): void
    {
        $this->assertSame('', $this->request_builder->buildRequest()->getBody()->getContents());

        $this->request_builder->setName('some');
        $this->assertSame('some', $this->request_builder->getName());

        $this->assertSame('{"Name":"some"}', $this->request_builder->buildRequest()->getBody()->getContents());
    }

    public function testCardCryptogramPacket(): void
    {
        $this->assertSame('', $this->request_builder->buildRequest()->getBody()->getContents());

        $this->request_builder->setCardCryptogramPacket('some');
        $this->assertSame('some', $this->request_builder->getCardCryptogramPacket());

        $this->assertSame(
            '{"CardCryptogramPacket":"some"}',
            $this->request_builder->buildRequest()->getBody()->getContents()
        );
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequestBuilder(): CardsAuthRequestBuilder
    {
        return new CardsAuthRequestBuilder;
    }

    /**
     * {@inheritdoc}
     */
    protected function getUri(): UriInterface
    {
        return new Uri('https://api.cloudpayments.ru/payments/cards/auth');
    }
}
