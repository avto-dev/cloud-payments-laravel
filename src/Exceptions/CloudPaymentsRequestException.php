<?php

namespace AvtoDev\CloudPayments\Exceptions;

use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Exception\RequestException;

class CloudPaymentsRequestException extends RequestException
{
    /**
     * {@inheritdoc}
     *
     * @return CloudPaymentsRequestException
     */
    public static function wrapException(RequestInterface $request, \Exception $e)
    {
        return $e instanceof self
            ? $e
            : new self($e->getMessage(), $request, null, $e);
    }
}
