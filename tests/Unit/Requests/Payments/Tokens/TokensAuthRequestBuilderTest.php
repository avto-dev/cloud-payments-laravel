<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Requests\Payments\Tokens;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use AvtoDev\Tests\Unit\Requests\AbstractRequestBuilderTestCase;
use AvtoDev\CloudPayments\Requests\Payments\Tokens\TokensAuthRequestBuilder;

#[CoversClass(TokensAuthRequestBuilder::class)]
class TokensAuthRequestBuilderTest extends AbstractRequestBuilderTestCase
{
    /**
     * @var TokensAuthRequestBuilder
     */
    protected $request_builder;

    public function testToken(): void
    {
        $this->request_builder->setToken('some')->setTransactionInitiatorCode(1);

        $this->assertSame('{"Token":"some","TrInitiatorCode":1}', $this->request_builder->buildRequest()->getBody()->getContents());
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequestBuilder(): TokensAuthRequestBuilder
    {
        return (new TokensAuthRequestBuilder)->setToken('some')->setTransactionInitiatorCode(1);
    }

    /**
     * {@inheritdoc}
     */
    protected function getUri(): UriInterface
    {
        return new Uri('https://api.cloudpayments.ru/payments/tokens/auth');
    }
}
