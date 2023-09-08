<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Requests\Payments\Tokens;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use AvtoDev\CloudPayments\Requests\Payments\Tokens\TokensAuthRequestBuilder;
use AvtoDev\CloudPayments\Requests\Payments\Tokens\TokensChargeRequestBuilder;

/**
 * @covers \AvtoDev\CloudPayments\Requests\Payments\Tokens\TokensChargeRequestBuilder
 */
class TokensChargeRequestBuilderTest extends TokensAuthRequestBuilderTest
{
    /**
     * {@inheritdoc}
     */
    protected function getRequestBuilder(): TokensAuthRequestBuilder
    {
        return (new TokensChargeRequestBuilder)->setToken('some')->setTransactionInitiatorCode(1);
    }

    /**
     * {@inheritdoc}
     */
    protected function getUri(): UriInterface
    {
        return new Uri('https://api.cloudpayments.ru/payments/tokens/charge');
    }
}
