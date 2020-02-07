<?php

declare(strict_types = 1);

namespace Unit\Requests;

use GuzzleHttp\Psr7\Uri;
use Tarampampam\Wrappers\Json;
use Psr\Http\Message\UriInterface;
use AvtoDev\Tests\AbstractTestCase;
use Psr\Http\Message\RequestInterface;
use AvtoDev\CloudPayments\Requests\AbstractRequestBuilder;

/**
 * @coversDefaultClass \AvtoDev\CloudPayments\Requests\AbstractRequestBuilder
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

    /**
     * @covers ::buildRequest
     * @covers ::getRequestId
     * @covers ::setRequestId
     */
    public function testRequestId(): void
    {
        $this->assertSame('', $this->request_builder->getRequestId());

        $request = $this->request_builder->buildRequest();

        $this->assertFalse($request->hasHeader('X-Request-ID'));

        $request_id = 'some_id';

        $this->request_builder->setRequestId($request_id);

        $this->assertSame($request_id, $this->request_builder->getRequestId());

        $request = $this->request_builder->buildRequest();

        $this->assertSame($request_id, $request->getHeader('X-Request-ID')[0]);
    }

    /**
     * @covers ::buildRequest
     */
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

    /**
     * @covers ::buildRequest
     */
    public function testBuildRequest(): void
    {
        $request = $this->request_builder->buildRequest();

        $this->assertInstanceOf(RequestInterface::class, $request);

        $this->assertSame($this->request_builder->params, Json::decode((string) $request->getBody()));
        $this->assertSame('application/json', $request->getHeader('Content-Type')[0]);
    }
}
