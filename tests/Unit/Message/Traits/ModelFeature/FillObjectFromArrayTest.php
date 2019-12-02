<?php

declare(strict_types = 1);

namespace Tests\Unit\AvtoDev\Tests\Unit\Message\Traits\ModelFeature;

use AvtoDev\CloudPayments\Message\Traits\ModelFeature\FillObjectFromArray;
use PHPUnit\Framework\TestCase;

/**
 * @group unit
 * @group fill-from-array
 * @coversDefaultClass \AvtoDev\CloudPayments\Message\Traits\ModelFeature\FillObjectFromArray
 */
class FillObjectFromArrayTest extends TestCase
{
    protected $class;

    protected function setUp(): void
    {
        parent::setUp();

        $this->class = new class
        {
            use FillObjectFromArray;

            /** @var string */
            protected $test_field;

            /**
             * @param string $test_field
             *
             * @return self
             */
            public function setTestField(string $test_field): self
            {
                $this->test_field = $test_field;

                return $this;
            }

            /**
             * @return string|null
             */
            public function getTestField(): ?string
            {
                return $this->test_field;
            }
        };
    }

    public function testSuccessLoad(): void
    {

        $this->class->fillObjectFromArray([
            'TestField'     => 'test_value',
            'UnloadedField' => 'value',
        ]);

        $this->assertSame('test_value', $this->class->getTestField());
    }

    public function testFailLoad(): void
    {

        $this->class->fillObjectFromArray([
            'test_field' => 'test_value',
        ]);

        $this->assertSame(null, $this->class->getTestField());
    }
}
