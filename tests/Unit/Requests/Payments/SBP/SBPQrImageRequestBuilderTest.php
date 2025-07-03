<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Requests\Payments\SBP;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use AvtoDev\CloudPayments\Requests\Payments\SBP\SBPQrImageRequestBuilder;
use AvtoDev\CloudPayments\Requests\Payments\SBP\AbstractSBPPaymentRequestBuilder;

#[
    CoversClass(AbstractSBPPaymentRequestBuilder::class),
    CoversClass(SBPQrImageRequestBuilder::class),
]
class SBPQrImageRequestBuilderTest extends AbstractSBPPaymentRequestBuilderTestCase
{
    /**
     * @inheritdoc
     */
    protected function getRequestBuilder(): SBPQrImageRequestBuilder
    {
        return new SBPQrImageRequestBuilder();
    }

    protected function getUri(): UriInterface
    {
        return new Uri('https://api.cloudpayments.ru/payments/qr/sbp/image');
    }
}
