<?php

namespace AvtoDev\CloudPayments;

use AvtoDev\CloudPayments\Exceptions\CloudPaymentsRequestException;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

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
     * Client constructor.
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
     * @throws GuzzleException
     *
     * @return ResponseInterface
     */
    public function send(RequestInterface $request): ResponseInterface
    {
        try {
            return $this->client->send($request, $this->getRequestOptions());
        } catch (\Exception $exception) {
            throw CloudPaymentsRequestException::wrapException($request, $exception);
        }
    }

    protected function getRequestOptions(): array
    {
        return [
            'auth' => [$this->config->getPublicId(), $this->config->getApiKey()],
        ];
    }
}
