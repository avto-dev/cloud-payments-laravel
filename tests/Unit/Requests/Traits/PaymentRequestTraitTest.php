<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Requests\Traits;

use Illuminate\Support\Str;
use AvtoDev\Tests\AbstractTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use AvtoDev\CloudPayments\Requests\Traits\PaymentRequestTrait;

#[CoversClass(PaymentRequestTrait::class)]
class PaymentRequestTraitTest extends AbstractTestCase
{
    protected $request_builder;

    protected function setUp(): void
    {
        parent::setUp();

        $this->request_builder = new class {
            use PaymentRequestTrait;

            public function getCommonPaymentParamsData(): array
            {
                return $this->getCommonPaymentParams();
            }
        };
    }

    public function testRequiredGettersAndSetters(): void
    {
        $properties = [
            'Amount'      => (float) \random_int(1, 100),
            'Currency'    => Str::random(),
            'IpAddress'   => Str::random(),
            'InvoiceId'   => Str::random(),
            'Description' => Str::random(),
            'AccountId'   => Str::random(),
            'Email'       => Str::random(),
            //'JsonData'  => [Str::random()], testJsonData
        ];

        foreach ($properties as $key => $value) {
            $this->fieldTest($key, $value);
        }
    }

    public function testJsonData(): void
    {
        $this->assertArrayNotHasKey('JsonData', $this->request_builder->getCommonPaymentParamsData());

        $this->request_builder->setJsonData(['some']);

        $common_payment_params = $this->request_builder->getCommonPaymentParamsData();

        $this->assertArrayHasKey('JsonData', $common_payment_params);

        $this->assertSame('["some"]', $common_payment_params['JsonData']);
    }

    protected function fieldTest(string $property_name, $value): void
    {
        $method_postfix = Str::studly($property_name);

        $this->request_builder->{'set' . $method_postfix}($value);

        $this->assertSame($value, $this->request_builder->getCommonPaymentParamsData()[$method_postfix]);
    }
}
