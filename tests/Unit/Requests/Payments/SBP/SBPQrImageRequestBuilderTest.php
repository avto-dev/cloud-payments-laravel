<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Requests\Payments\SBP;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use AvtoDev\Tests\Unit\Requests\AbstractRequestBuilderTestCase;
use AvtoDev\CloudPayments\Requests\Payments\SBP\SBPQrImageRequestBuilder;

/**
 * @covers \AvtoDev\CloudPayments\Requests\Payments\SBP\SBPQrImageRequestBuilder
 */
class SBPQrImageRequestBuilderTest extends AbstractRequestBuilderTestCase
{
    /**
     * @inheritdoc
     */
    protected function getRequestBuilder(): SBPQrImageRequestBuilder
    {
        return new SBPQrImageRequestBuilder();
    }

    /**
     * @inheritdoc
     */
    protected function getUri(): UriInterface
    {
        return new Uri('https://api.cloudpayments.ru/payments/qr/sbp/image');
    }
}
