<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Exceptions;

use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Exception\RequestException;

class CloudPaymentsRequestException extends RequestException
{
    /**
     * @param RequestInterface $request
     * @param \Exception       $e
     *
     * @return CloudPaymentsRequestException
     */
    public static function wrapException(RequestInterface $request, $e): RequestException
    {
        return $e instanceof self
            ? $e
            : new self($e->getMessage(), $request, null, $e);
    }
}
