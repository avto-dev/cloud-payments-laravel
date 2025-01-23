<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Requests\Payments\SBP;

use AvtoDev\CloudPayments\References\PayersDevice;
use AvtoDev\Tests\Unit\Requests\AbstractRequestBuilderTestCase;
use AvtoDev\CloudPayments\Requests\Payments\SBP\AbstractSBPPaymentRequestBuilder;

abstract class AbstractSBPPaymentRequestBuilderTestCase extends AbstractRequestBuilderTestCase
{
    /**
     * @var AbstractSBPPaymentRequestBuilder
     */
    protected $request_builder;

    public function testOptionalFields(): void
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

        $this->request_builder
            ->setSuccessRedirectUrl($redirect_url)
            ->setOs($os)
            ->setDevice($device)
            ->setBrowser($browser)
            ->setTtlInMinutes($ttl)
            ->setIsWebview($is_web_view)
            ->setNeedSaveCard($need_save_card)
            ->setIsTest($is_test);

        $request_data = \json_decode($this->request_builder->buildRequest()->getBody()->getContents(), true);

        $this->assertSame($redirect_url, $request_data['SuccessRedirectUrl']);
        $this->assertSame($os, $request_data['Os']);
        $this->assertSame($device->value, $request_data['Device']);
        $this->assertSame($browser, $request_data['Browser']);
        $this->assertSame($ttl, $request_data['TtlMinutes']);
        $this->assertSame($is_web_view, $request_data['Webview']);
        $this->assertSame($need_save_card, $request_data['SaveCard']);
        $this->assertSame($is_test, $request_data['IsTest']);
    }
}
