<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Requests\Traits;

use AvtoDev\CloudPayments\Requests\Traits\PaymentRequestTrait;
use AvtoDev\Tests\AbstractTestCase;
use Illuminate\Support\Str;

/**
 * @covers \AvtoDev\CloudPayments\Requests\Traits\PaymentRequestTrait
 */
class PaymentRequestTraitTest extends AbstractTestCase
{
    protected $request_builder;

    public function setUp(): void
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
            'Amount'    => (float) random_int(0, 100),
            'Currency'  => Str::random(),
            'IpAddress' => Str::random(),
        ];

        foreach ($properties as $key => $value) {
            $this->fieldTest($key, $value, false);
        }
    }

    public function testNullableGettersAndSetters(): void
    {
        $properties = [
            'InvoiceId'   => Str::random(),
            'Description' => Str::random(),
            'AccountId'   => Str::random(),
            'Email'       => Str::random(),
            //'JsonData'    => [Str::random()], testJsonData
        ];

        foreach ($properties as $key => $value) {
            $this->fieldTest($key, $value, true);
        }
    }

    public function testJsonData(): void
    {
        $this->assertArrayNotHasKey('JsonData', $this->request_builder->getCommonPaymentParamsData());

        $this->request_builder->setJsonData(['some']);

        $this->assertSame(['some'], $this->request_builder->getJsonData());

        $common_payment_params = $this->request_builder->getCommonPaymentParamsData();

        $this->assertArrayHasKey('JsonData', $common_payment_params);

        $this->assertSame('["some"]', $common_payment_params['JsonData']);
    }

    protected function fieldTest(string $property_name, $value, bool $is_nullable): void
    {
        $method_postfix = Str::studly($property_name);

        $this->request_builder->{'set' . $method_postfix}($value);

        $this->assertSame($value, $this->request_builder->{'get' . $method_postfix}());

        $this->assertSame($value, $this->request_builder->getCommonPaymentParamsData()[$method_postfix]);

        if ($is_nullable) {
            $this->request_builder->{'set' . $method_postfix}(null);

            $this->assertNull($this->request_builder->{'get' . $method_postfix}());

            $this->assertArrayNotHasKey($method_postfix, $this->request_builder->getCommonPaymentParamsData());
        }
    }
}
