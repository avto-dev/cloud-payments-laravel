<?php

declare(strict_types = 1);

namespace Unit\Requests;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use AvtoDev\Tests\AbstractTestCase;
use Psr\Http\Message\RequestInterface;
use AvtoDev\CloudPayments\Requests\AbstractRequestBuilder;

/**
 * @covers \AvtoDev\CloudPayments\Requests\AbstractRequestBuilder
 */
class AbstractRequestTest extends AbstractTestCase
{
    /**
     * @var AbstractRequestBuilder
     */
    protected $request_builder;

    protected function setUp(): void
    {
        parent::setUp();

        $this->request_builder = new class extends AbstractRequestBuilder {
            public $uri        = 'test/uri';

            public $params = [
                'foo' => 'bar',
            ];

            protected function getRequestPayload(): array
            {
                return $this->params;
            }

            protected function getUri(): UriInterface
            {
                return new Uri($this->uri);
            }
        };
    }

    public function testRequestId(): void
    {
        $request = $this->request_builder->buildRequest();

        $this->assertFalse($request->hasHeader('X-Request-ID'));

        $request_id = 'some_id';

        $this->request_builder->setRequestId($request_id);

        $request = $this->request_builder->buildRequest();

        $this->assertSame($request_id, $request->getHeader('X-Request-ID')[0]);
    }

    public function testUriResolve(): void
    {
        $request = $this->request_builder->buildRequest();

        $this->assertSame('https', $request->getUri()->getScheme());
        $this->assertSame('api.cloudpayments.ru', $request->getUri()->getHost());

        $this->request_builder->uri = 'http://example.com/test';

        $request = $this->request_builder->buildRequest();

        $this->assertSame('http', $request->getUri()->getScheme());
        $this->assertSame('example.com', $request->getUri()->getHost());
    }

    public function testBuildRequest(): void
    {
        $request = $this->request_builder->buildRequest();

        $this->assertInstanceOf(RequestInterface::class, $request);

        $this->assertSame($this->request_builder->params, \json_decode((string) $request->getBody(), true));
        $this->assertSame('application/json', $request->getHeader('Content-Type')[0]);
    }
}
