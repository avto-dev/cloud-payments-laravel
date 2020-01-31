<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Requests;

use AvtoDev\CloudPayments\Requests\AbstractRequestBuilder;
use AvtoDev\Tests\Unit\AbstractUnitTestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

abstract class AbstractRequestBuilderTest extends AbstractUnitTestCase
{
    /**
     * @return AbstractRequestBuilder
     */
    protected $request_builder;

    /**
     * @var UriInterface
     */
    protected $uri;

    public function setUp(): void
    {
        parent::setUp();
        $this->request_builder = $this->getRequestBuilder();
        $this->uri             = $this->getUri();
    }

    /**
     * @covers ::getUri
     *
     * @throws \Tarampampam\Wrappers\Exceptions\JsonEncodeDecodeException
     */
    public function testUri()
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
    public function testHeaders()
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
