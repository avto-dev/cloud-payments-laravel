<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Strategy\Specification;

use AvtoDev\CloudPayments\Message\Strategy\Specification\RefundPaymentSpecification;
use PHPUnit\Framework\TestCase;

/**
 * @group  unit
 * @group  refund-payment-specification
 * @covers \AvtoDev\CloudPayments\Message\Strategy\Specification\RefundPaymentSpecification
 */
class RefundPaymentSpecificationTest extends TestCase
{
    /** @var RefundPaymentSpecification */
    protected $specification;

    protected function setUp(): void
    {
        parent::setUp();
        $this->specification = new RefundPaymentSpecification;
    }

    public function testIsTrue()
    {
        $raw_response = [
            'Model'   => [
                'TransactionId' => 504,
            ],
            'Success' => true,
        ];

        $this->assertTrue($this->specification->isSatisfiedBy($raw_response));
    }
}
