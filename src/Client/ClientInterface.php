<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Client;

use AvtoDev\CloudPayments\Message\Request\RequestInterface;
use AvtoDev\CloudPayments\Message\Response\ResponseInterface;

interface ClientInterface
{
    /**
     * Sending request
     *
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     */
    public function send(RequestInterface $request): ResponseInterface;
}
