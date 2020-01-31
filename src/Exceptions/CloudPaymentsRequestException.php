<?php

namespace AvtoDev\CloudPayments\Exceptions;

use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\RequestInterface;

class CloudPaymentsRequestException extends RequestException
{
    /**
     * {@inheritdoc}
     */
    public static function wrapException(RequestInterface $request, \Exception $e)
    {
        return $e instanceof self
            ? $e
            : new self($e->getMessage(), $request, null, $e);
    }
}
