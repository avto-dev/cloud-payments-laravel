<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Request;

use AvtoDev\CloudPayments\Message\Request\Exception\ClientCannotBeNull;
use Tarampampam\Wrappers\Json;
use AvtoDev\CloudPayments\Client\ClientInterface;
use AvtoDev\CloudPayments\Message\Response\ResponseInterface;
use AvtoDev\CloudPayments\Message\Strategy\StrategyInterface;
use AvtoDev\CloudPayments\Message\Request\Model\ModelInterface;

abstract class AbstractRequest implements RequestInterface
{
    protected const API_CLOUD_PAYMENT_DOMAIN = 'https://api.cloudpayments.ru/';

    /**
     * @var ModelInterface|null
     */
    protected $model;

    /**
     * @var string
     */
    protected $method = 'POST';

    /**
     * @var array
     */
    protected $headers = [
        'Content-Type' => 'application/json',
    ];

    /**
     * @var ClientInterface|null
     */
    protected $client;

    protected function __construct()
    {
    }

    /**
     * @return RequestInterface
     */
    public static function create(): RequestInterface
    {
        return new static;
    }

    /**
     * Returns relative url of request (without domain part)
     *
     * @return string
     */
    abstract protected function getRelativeUrl(): string;

    /**
     * {@inheritDoc}
     */
    public function getUrl(): string
    {
        return rtrim($this->getDomain(), '/') . '/' . ltrim($this->getRelativeUrl(), '/');
    }

    /**
     * Main domain name of cloud payments api server
     *
     * @return string
     */
    protected function getDomain(): string
    {
        return static::API_CLOUD_PAYMENT_DOMAIN;
    }

    /**
     * {@inheritDoc}
     */
    public function getModel(): ModelInterface
    {
        if ($this->model === null) {
            $this->model = $this->createModel();
        }

        return $this->model;
    }

    /**
     * @return ModelInterface
     */
    abstract protected function createModel(): ModelInterface;

    /**
     * {@inheritDoc}
     */
    abstract public function getStrategy(): StrategyInterface;

    /**
     * {@inheritDoc}
     */
    public function getBody(): ?string
    {
        return Json::encode($this->getModel()->toArray());
    }

    /**
     * {@inheritDoc}
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * {@inheritDoc}
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * {@inheritDoc}
     */
    public function setClient(ClientInterface $client): RequestInterface
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return ClientInterface
     * @throws \LogicException
     */
    protected function getClient(): ClientInterface
    {
        if ($this->client === null) {
            throw new ClientCannotBeNull('The client cannot be null');
        }

        return $this->client;
    }

    /**
     * {@inheritDoc}
     */
    public function send(): ResponseInterface
    {
        return $this->getClient()->send($this);
    }
}
