<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Requests\Payments\Tokens;

use AvtoDev\CloudPayments\Requests\Payments\Tokens\TokensAuthRequestBuilder;
use AvtoDev\Tests\Unit\Requests\AbstractRequestBuilderTest;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;

/**
 * @coversDefaultClass \AvtoDev\CloudPayments\Requests\Payments\Tokens\TokensAuthRequestBuilder
 */
class TokensAuthRequestBuilderTest extends AbstractRequestBuilderTest
{
    /**
     * @var TokensAuthRequestBuilder
     */
    protected $request_builder;

    public function testToken()
    {
        $this->assertNull($this->request_builder->getToken());

        $this->request_builder->setToken('some');
        $this->assertSame('some', $this->request_builder->getToken());

        $this->assertSame('{"Token":"some"}', $this->request_builder->buildRequest()->getBody()->getContents());
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequestBuilder(): TokensAuthRequestBuilder
    {
        return new TokensAuthRequestBuilder;
    }

    /**
     * {@inheritdoc}
     */
    protected function getUri(): UriInterface
    {
        return new Uri('https://api.cloudpayments.ru/payments/tokens/auth');
    }
}
