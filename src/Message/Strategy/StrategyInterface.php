<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Strategy;

use AvtoDev\CloudPayments\Message\Response\ResponseInterface;
use AvtoDev\CloudPayments\Message\Strategy\Exception\ClassNotFoundException;
use AvtoDev\CloudPayments\Message\Strategy\Exception\IsNotInstanceOfException;
use AvtoDev\CloudPayments\Message\Strategy\Exception\StrategyCannotCreateResponseException;

interface StrategyInterface
{
    /**
     * Converts raw response to `ResponseInterface`.
     *
     * @param array $raw_response
     *
     * @throws StrategyCannotCreateResponseException
     * @throws IsNotInstanceOfException
     * @throws ClassNotFoundException
     *
     * @return ResponseInterface
     */
    public function prepareRawResponse(array $raw_response): ResponseInterface;
}
