<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Strategy\Specification;

use AvtoDev\CloudPayments\Message\Strategy\Specification\NotSuccessSpecification;
use PHPUnit\Framework\TestCase;

/**
 * @group  unit
 * @group  not-success-specification
 * @covers \AvtoDev\CloudPayments\Message\Strategy\Specification\NotSuccessSpecification
 */
class NotSuccessSpecificationTest extends TestCase
{
    /** @var NotSuccessSpecification */
    protected $specification;

    protected function setUp(): void
    {
        parent::setUp();
        $this->specification = new NotSuccessSpecification;
    }

    public function testIsTrue()
    {
        $raw_response = [
            'Success' => false,
        ];

        $this->assertTrue($this->specification->isSatisfiedBy($raw_response));
    }
}
