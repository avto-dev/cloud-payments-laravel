<?php

declare(strict_types = 1);

namespace Unit\Requests\Traits;

use AvtoDev\CloudPayments\Receipts\Receipt;
use AvtoDev\CloudPayments\Requests\Traits\HasReceipt;
use AvtoDev\Tests\Unit\AbstractUnitTestCase;

/**
 * @covers \AvtoDev\CloudPayments\Requests\Traits\HasReceipt
 */
class HasReceiptTest extends AbstractUnitTestCase
{
    protected $request_builder;

    public function setUp(): void
    {
        parent::setUp();
        $this->request_builder = new class {
            use HasReceipt;

            public function getData()
            {
                return $this->getReceiptData();
            }
        };
    }

    public function testGettersAndSetters()
    {
        $receipt = new Receipt;

        $this->assertSame([], $this->request_builder->getData());

        $this->request_builder->setReceipt($receipt);

        $this->assertSame($receipt, $this->request_builder->getReceipt());

        $this->assertSame(
            ['cloudPayments' => ['customerReceipt' => $receipt->toArray()]],
            $this->request_builder->getData()
        );
    }
}
