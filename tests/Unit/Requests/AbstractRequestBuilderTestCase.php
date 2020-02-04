<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Requests;

use Psr\Http\Message\UriInterface;
use AvtoDev\Tests\AbstractTestCase;
use Psr\Http\Message\RequestInterface;
use AvtoDev\CloudPayments\Requests\AbstractRequestBuilder;

abstract class AbstractRequestBuilderTestCase extends AbstractTestCase
{
    /**
     * @return AbstractRequestBuilder
     */
    protected $request_builder;

    /**
     * @var UriInterface
     */
    protected $uri;

    protected function setUp(): void
    {
        parent::setUp();
        $this->request_builder = $this->getRequestBuilder();
        $this->uri             = $this->getUri();
    }

    /**
     * @covers ::getUri
     */
    public function testUri(): void
    {
        $uri = $this->request_builder->buildRequest()->getUri();

        $this->assertSame($uri->getScheme(), $this->getUri()->getScheme());
        $this->assertSame($uri->getHost(), $this->getUri()->getHost());
        $this->assertSame($uri->getPath(), $this->getUri()->getPath());
        $this->assertEquals($uri, $this->getUri());
    }

    /**
     * @coversNothing
     */
    public function testHeaders(): void
    {
        /** @var RequestInterface $request */
        $request = $this->request_builder->buildRequest();
        $this->assertTrue($request->hasHeader('Content-Type'));
        $this->assertSame('application/json', $request->getHeader('Content-Type')[0]);
    }

    abstract protected function getUri(): UriInterface;

    /**
     * @return AbstractRequestBuilder
     */
    abstract protected function getRequestBuilder();
}
