<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Strategy\Specification;

use AvtoDev\CloudPayments\Message\Strategy\Specification\InvalidRequestSpecification;
use PHPUnit\Framework\TestCase;

/**
 * @group  unit
 * @group  invalid-request-specification
 * @covers \AvtoDev\CloudPayments\Message\Strategy\Specification\InvalidRequestSpecification
 */
class InvalidRequestSpecificationTest extends TestCase
{
    /** @var InvalidRequestSpecification */
    protected $specification;

    protected function setUp(): void
    {
        parent::setUp();
        $this->specification = new InvalidRequestSpecification;
    }

    public function testIsTrue()
    {
        $raw_response = [
            'Success' => false,
            'Message' => 'Amount is required',
        ];

        $this->assertTrue($this->specification->isSatisfiedBy($raw_response));
    }
}
