<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Requests\Payments\Tokens;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;

/**
 * @see https://developers.cloudpayments.ru/#oplata-po-tokenu-rekarring
 */
class TokensChargeRequestBuilder extends TokensAuthRequestBuilder
{
    /**
     * {@inheritdoc}
     */
    protected function getUri(): UriInterface
    {
        return new Uri('/payments/tokens/charge');
    }
}
