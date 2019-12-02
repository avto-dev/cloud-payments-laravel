<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Request;

use AvtoDev\CloudPayments\Client\ClientInterface;
use AvtoDev\CloudPayments\Message\Request\Exception\ClientCannotBeNull;
use AvtoDev\CloudPayments\Message\Response\ResponseInterface;
use AvtoDev\CloudPayments\Message\Strategy\StrategyInterface;
use AvtoDev\CloudPayments\Message\Request\Model\ModelInterface;

interface RequestInterface
{
    /**
     * @return static
     */
    public static function create(): RequestInterface;

    /**
     * Get a payment url. Request sent to this address
     *
     * @return string
     */
    public function getUrl(): string;

    /**
     * Get a data model of request. Different data models are set for different requests.
     *
     * @return ModelInterface
     */
    public function getModel(): ModelInterface;

    /**
     * Get a strategy that determines which response to this request should be returned
     *
     * @return StrategyInterface
     */
    public function getStrategy(): StrategyInterface;

    /**
     * The request body to send
     *
     * @return string|null
     * @throws \Tarampampam\Wrappers\Exceptions\JsonEncodeDecodeException
     *
     */
    public function getBody(): ?string;

    /**
     * Some request method, eq "POST", "GET". Default "POST"
     *
     * @return string
     */
    public function getMethod(): string;

    /**
     * Request Headers for HTTP request
     *
     * @return array
     */
    public function getHeaders(): array;

    /**
     * The method to send the request
     *
     * @return ResponseInterface
     *
     * @throws ClientCannotBeNull
     */
    public function send(): ResponseInterface;

    /**
     * If we want use the `send` method, we should set a `CloudPaymentClientInterface`
     *
     * @param ClientInterface $client
     *
     * @return self
     */
    public function setClient(ClientInterface $client): self;
}
