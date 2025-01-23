<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Requests\Payments\SBP;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use AvtoDev\CloudPayments\Requests\Payments\SBP\SBPQrLinkRequestBuilder;

/**
 * @covers \AvtoDev\CloudPayments\Requests\Payments\SBP\AbstractSBPPaymentRequestBuilder
 * @covers \AvtoDev\CloudPayments\Requests\Payments\SBP\SBPQrLinkRequestBuilder
 */
class SBPQrLinkRequestBuilderTest extends AbstractSBPPaymentRequestBuilderTestCase
{
    /**
     * @inheritdoc
     */
    protected function getRequestBuilder(): SBPQrLinkRequestBuilder
    {
        return new SBPQrLinkRequestBuilder();
    }

    /**
     * @inheritdoc
     */
    protected function getUri(): UriInterface
    {
        return new Uri('https://api.cloudpayments.ru/payments/qr/sbp/link');
    }
}
