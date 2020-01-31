<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Exceptions;

use AvtoDev\CloudPayments\Exceptions\CloudPaymentsRequestException;
use AvtoDev\Tests\AbstractTestCase;
use GuzzleHttp\Psr7\Request;

/**
 * @covers \AvtoDev\CloudPayments\Exceptions\CloudPaymentsRequestException
 */
class CloudPaymentsRequestExceptionTest extends AbstractTestCase
{
    public function testWrap()
    {
        $request = new Request('GET', 'example.com');

        $exception = CloudPaymentsRequestException::wrapException($request, $base_exception = new \Exception);

        $this->assertNotSame($base_exception, $exception);

        $this->assertSame($exception, CloudPaymentsRequestException::wrapException($request, $exception));
    }
}
