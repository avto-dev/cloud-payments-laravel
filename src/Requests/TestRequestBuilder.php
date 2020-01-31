<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Requests;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;

/**
 * @see https://developers.cloudpayments.ru/#testovyy-metod
 */
class TestRequestBuilder extends AbstractRequestBuilder
{
    /**
     * {@inheritdoc}
     */
    protected function getUri(): UriInterface
    {
        return new Uri('/test');
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequestParams(): array
    {
        return [];
    }
}
