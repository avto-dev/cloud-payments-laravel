<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Strategy;

use AvtoDev\CloudPayments\Message\Response\InvalidRequestResponse;
use AvtoDev\CloudPayments\Message\Strategy\StrategyInterface;
use PHPUnit\Framework\TestCase;

/**
 * @group unit
 * @coversNothing
 */
abstract class AbstractStrategyTest extends TestCase
{
    /** @var StrategyInterface */
    protected $strategy;

    public function testInvalidRequestResponse(): void
    {
        $raw_response = [
            'Success' => false,
            'Message' => 'InvalidRequestResponse',
        ];

        $response = $this->strategy->prepareRawResponse($raw_response);

        $this->assertTrue($response instanceof InvalidRequestResponse);
        $this->assertSame('InvalidRequestResponse', $response->getMessage());
        $this->assertFalse($response->isSuccess());
    }
}
