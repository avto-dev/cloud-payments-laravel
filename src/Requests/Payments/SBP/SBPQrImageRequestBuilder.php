<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Requests\Payments\SBP;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;

class SBPQrImageRequestBuilder extends AbstractSBPPaymentRequestBuilder
{
    /**
     * @inheritdoc
     */
    protected function getUri(): UriInterface
    {
        return new Uri('/payments/qr/sbp/image');
    }
}
