<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Requests\Payments\Cards;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use AvtoDev\Tests\Unit\Requests\AbstractRequestBuilderTestCase;
use AvtoDev\CloudPayments\Requests\Payments\Cards\CardsAuthRequestBuilder;

#[CoversClass(CardsAuthRequestBuilder::class)]
class CardsAuthRequestBuilderTest extends AbstractRequestBuilderTestCase
{
    /**
     * @var CardsAuthRequestBuilder
     */
    protected $request_builder;

    public function testName(): void
    {
        $this->assertSame('', $this->request_builder->buildRequest()->getBody()->getContents());

        $this->request_builder->setName('some');

        $this->assertSame('{"Name":"some"}', $this->request_builder->buildRequest()->getBody()->getContents());
    }

    public function testCardCryptogramPacket(): void
    {
        $this->assertSame('', $this->request_builder->buildRequest()->getBody()->getContents());

        $this->request_builder->setCardCryptogramPacket('some');

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
