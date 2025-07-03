<?php

declare(strict_types = 1);

namespace Unit\Requests\Traits;

use AvtoDev\Tests\AbstractTestCase;
use AvtoDev\CloudPayments\Receipts\Receipt;
use PHPUnit\Framework\Attributes\CoversClass;
use AvtoDev\CloudPayments\Requests\Traits\HasReceipt;

#[CoversClass(HasReceipt::class)]
class HasReceiptTest extends AbstractTestCase
{
    protected $request_builder;

    protected function setUp(): void
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

    public function testGettersAndSetters(): void
    {
        $receipt = new Receipt;

        $this->assertSame([], $this->request_builder->getData());

        $this->request_builder->setReceipt($receipt);

        $this->assertSame(
            ['cloudPayments' => ['customerReceipt' => $receipt->toArray()]],
            $this->request_builder->getData()
        );
    }
}
