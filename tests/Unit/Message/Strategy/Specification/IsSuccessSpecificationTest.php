<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Strategy\Specification;

use AvtoDev\CloudPayments\Message\Strategy\Specification\IsSuccessSpecification;
use PHPUnit\Framework\TestCase;

/**
 * @group  unit
 * @group  is-success-specification
 * @covers \AvtoDev\CloudPayments\Message\Strategy\Specification\IsSuccessSpecification
 */
class IsSuccessSpecificationTest extends TestCase
{
    /** @var IsSuccessSpecification */
    protected $specification;

    protected function setUp(): void
    {
        parent::setUp();
        $this->specification = new IsSuccessSpecification;
    }

    public function testIsTrue()
    {
        $raw_response = [
            'Success' => true,
        ];

        $this->assertTrue($this->specification->isSatisfiedBy($raw_response));
    }
}
