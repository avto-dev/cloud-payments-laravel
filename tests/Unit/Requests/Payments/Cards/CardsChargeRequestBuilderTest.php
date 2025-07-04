<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Requests\Payments\Cards;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use AvtoDev\CloudPayments\Requests\Payments\Cards\CardsAuthRequestBuilder;
use AvtoDev\CloudPayments\Requests\Payments\Cards\CardsChargeRequestBuilder;

#[CoversClass(CardsChargeRequestBuilder::class)]
class CardsChargeRequestBuilderTest extends CardsAuthRequestBuilderTest
{
    protected function getUri(): UriInterface
    {
        return new Uri('https://api.cloudpayments.ru/payments/cards/charge');
    }

    protected function getRequestBuilder(): CardsAuthRequestBuilder
    {
        return new CardsChargeRequestBuilder;
    }
}
