<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Requests\Payments\SBP;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\Attributes\TestWith;
use AvtoDev\CloudPayments\Receipts\Receipt;
use AvtoDev\CloudPayments\References\Interval;
use AvtoDev\CloudPayments\References\PayersDevice;
use AvtoDev\CloudPayments\ValueObjects\SubscriptionParams;
use AvtoDev\Tests\Unit\Requests\AbstractRequestBuilderTestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;
use AvtoDev\CloudPayments\Requests\Payments\SBP\AbstractSBPPaymentRequestBuilder;

abstract class AbstractSBPPaymentRequestBuilderTestCase extends AbstractRequestBuilderTestCase
{
    use InteractsWithExceptionHandling;

    /**
     * @var AbstractSBPPaymentRequestBuilder
     */
    protected $request_builder;

    #[Test, TestDox('Checking the use of optional parameters in a request')]
    public function successfullySetOptionalRequestParameters(): void
    {
        $redirect_url   = $this->faker->url();
        $os             = $this->faker->randomElement(['Android', 'iOS', 'Windows']);
        /** @var PayersDevice $device */
        $device         = $this->faker->randomElement(PayersDevice::cases());
        $browser        = $this->faker->randomElement(['Chrome', 'Firefox', 'Opera', 'Safari']);
        $ttl            = $this->faker->numberBetween(1, 129600);
        $is_web_view    = $this->faker->boolean();
        $need_save_card = $this->faker->boolean();
        $is_test        = $this->faker->boolean();

        $subscription_params = new SubscriptionParams(
            $interval = $this->faker->randomElement(Interval::INTERVALS_LIST),
            $period   = $this->faker->randomDigitNotNull(),
        );

        $receipt = new Receipt();

        $this->request_builder
            ->setSuccessRedirectUrl($redirect_url)
            ->setOs($os)
            ->setDevice($device)
            ->setBrowser($browser)
            ->setTtlInMinutes($ttl)
            ->setIsWebview($is_web_view)
            ->setNeedSaveCard($need_save_card)
            ->setIsTest($is_test)
            ->setSubscriptionParams($subscription_params)
            ->setReceipt($receipt);

        $request_data = \json_decode($this->request_builder->buildRequest()->getBody()->getContents(), true);

        $json_data = \json_decode($request_data['JsonData'], true);

        $this->assertSame($redirect_url, $request_data['SuccessRedirectUrl']);
        $this->assertSame($os, $request_data['Os']);
        $this->assertSame($device->value, $request_data['Device']);
        $this->assertSame($browser, $request_data['Browser']);
        $this->assertSame($ttl, $request_data['TtlMinutes']);
        $this->assertSame($is_web_view, $request_data['Webview']);
        $this->assertSame($need_save_card, $request_data['SaveCard']);
        $this->assertSame($is_test, $request_data['IsTest']);
        $this->assertEqualsCanonicalizing(
            ['Interval' => $interval, 'Period' => $period],
            $json_data['cloudPayments']['recurrent'] ?? [],
        );
        $this->assertArrayHasKey('customerReceipt', $json_data['cloudPayments'] ?? []);
    }

    #[
        Test,
        TestDox('The TTL parameter value must be in the range from 1 to 129600'),
        TestWith([0]),
        TestWith([129601])
    ]
    public function throwExceptionWhenTtlValueIsInvalid(int $ttl_in_minutes): void
    {
        $this->assertThrows(
            fn () => $this->request_builder->setTtlInMinutes($ttl_in_minutes),
            \InvalidArgumentException::class,
        );
    }
}
