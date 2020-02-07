<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Exceptions;

use GuzzleHttp\Psr7\Request;
use AvtoDev\Tests\AbstractTestCase;
use AvtoDev\CloudPayments\Exceptions\CloudPaymentsRequestException;

/**
 * @covers \AvtoDev\CloudPayments\Exceptions\CloudPaymentsRequestException
 */
class CloudPaymentsRequestExceptionTest extends AbstractTestCase
{
    public function testWrap(): void
    {
        $request = new Request('GET', 'example.com');

        $exception = CloudPaymentsRequestException::wrapException($request, $base_exception = new \Exception);

        $this->assertNotSame($base_exception, $exception);

        $this->assertSame($exception, CloudPaymentsRequestException::wrapException($request, $exception));
    }
}
