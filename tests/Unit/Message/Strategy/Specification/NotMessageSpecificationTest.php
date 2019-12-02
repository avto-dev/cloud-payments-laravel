<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Strategy\Specification;

use AvtoDev\CloudPayments\Message\Strategy\Specification\NotMessageSpecification;
use PHPUnit\Framework\TestCase;

/**
 * @group  unit
 * @group  not-message-specification
 * @covers \AvtoDev\CloudPayments\Message\Strategy\Specification\NotMessageSpecification
 */
class NotMessageSpecificationTest extends TestCase
{
    /** @var NotMessageSpecification */
    protected $specification;

    protected function setUp(): void
    {
        parent::setUp();
        $this->specification = new NotMessageSpecification;
    }

    public function testIsTrue()
    {
        $raw_response = [
            'Message' => '',
        ];

        $this->assertTrue($this->specification->isSatisfiedBy($raw_response));
    }
}
