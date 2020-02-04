<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\GuzzleException;
use AvtoDev\CloudPayments\Exceptions\CloudPaymentsRequestException;

class Client
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Config
     */
    protected $config;

    /**
     * Create a new Client instance.
     *
     * @param ClientInterface $client
     * @param Config          $config
     */
    public function __construct(ClientInterface $client, Config $config)
    {
        $this->client = $client;
        $this->config = $config;
    }

    /**
     * @param RequestInterface $request
     *
     * @throws CloudPaymentsRequestException
     *
     * @return ResponseInterface
     */
    public function send(RequestInterface $request): ResponseInterface
    {
        $request = $this->updateRequest($request);
        try {
            return $this->client->send($request);
        } catch (GuzzleException $exception) {
            /** @var \Exception $exception */
            throw CloudPaymentsRequestException::wrapException($request, $exception);
        }
    }

    public function updateRequest(RequestInterface $request): RequestInterface
    {
        /** @var RequestInterface $request */
        $request = $request->withHeader(
            'Authorization',
            'Basic ' . base64_encode($this->config->getPublicId() . ':' . $this->config->getApiKey())
        );

        return $request;
    }
}
