<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Requests;

use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\UriResolver;
use Psr\Http\Message\UriInterface;
use Psr\Http\Message\RequestInterface;
use function GuzzleHttp\Psr7\stream_for;

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
     * @throws \JsonException
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

        $request_data = $this->filterPayload($this->getRequestPayload());

        if ($request_data !== []) {
            /** @var RequestInterface $request */
            $request = $request->withBody(stream_for(\json_encode($request_data, JSON_THROW_ON_ERROR)));
        }

        return $request;
    }

    /**
     * @param array<string,mixed> $payload
     *
     * @return array<string,mixed>
     */
    protected function filterPayload(array $payload): array
    {
        return \array_filter($payload, function ($value) {
            return $value !== null && $value !== [];
        });
    }

    /**
     * Returns request parameters.
     *
     * @return array<string,mixed>
     */
    abstract protected function getRequestPayload(): array;

    /**
     * @return UriInterface
     */
    abstract protected function getUri(): UriInterface;
}
