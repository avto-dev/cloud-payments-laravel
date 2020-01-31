<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Requests;

use GuzzleHttp\Psr7\Request;
use function GuzzleHttp\Psr7\stream_for;
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Psr7\UriResolver;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;
use Tarampampam\Wrappers\Json;

abstract class AbstractRequestBuilder
{
    private const BASE_URI = 'https://api.cloudpayments.ru';

    /**
     * @var string
     */
    protected $request_id = '';

    /**
     * @see https://developers.cloudpayments.ru/#idempotentnost-api
     *
     * @param string $request_id
     *
     * @return $this
     */
    public function setRequestId(string $request_id): self
    {
        $this->request_id = $request_id;

        return $this;
    }

    /**
     * @return string
     */
    public function getRequestId(): string
    {
        return $this->request_id;
    }

    /**
     * @throws \Tarampampam\Wrappers\Exceptions\JsonEncodeDecodeException
     *
     * @return RequestInterface
     */
    public function buildRequest(): RequestInterface
    {
        $uri = $this->getUri();

        if ($uri->getHost() === '') {
            $uri = UriResolver::resolve(new Uri(self::BASE_URI), $uri);
        }

        $request = new Request('POST', $uri);

        if ($this->request_id !== '') {
            $request = $request->withHeader('X-Request-ID', $this->request_id);
        }

        /** @var RequestInterface $request */
        $request = $request->withHeader('Content-Type', 'application/json');

        $request_data = \array_filter($this->getRequestParams(), static function ($value) {
            return $value !== null && $value !== [];
        });

        if ($request_data !== []) {
            /** @var RequestInterface $request */
            $request = $request->withBody(stream_for(Json::encode($request_data)));
        }

        return $request;
    }

    /**
     * Returns request parameters.
     *
     * @return array
     */
    abstract protected function getRequestParams(): array;

    /**
     * @return UriInterface
     */
    abstract protected function getUri(): UriInterface;
}
