<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Requests\Traits;

use AvtoDev\Tests\AbstractTestCase;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\Attributes\CoversClass;
use AvtoDev\CloudPayments\References\Interval;
use AvtoDev\CloudPayments\ValueObjects\SubscriptionParams;
use AvtoDev\CloudPayments\Requests\Traits\HasInstructionsForCreatingSubscription;

#[CoversClass(HasInstructionsForCreatingSubscription::class)]
class HasInstructionsForCreatingSubscriptionTest extends AbstractTestCase
{
    protected $request_builder;

    protected function setUp(): void
    {
        parent::setUp();

        $this->request_builder = new class {
            use HasInstructionsForCreatingSubscription;
        };
    }

    protected function tearDown(): void
    {
        unset($this->request_builder);

        parent::tearDown();
    }

    #[Test, TestDox('Check setter and getter methods')]
    public function subscriptionParams(): void
    {
        $interval = $this->faker->randomElement(Interval::INTERVALS_LIST);
        $period   = $this->faker->randomDigitNotNull();

        $subscription_params = new SubscriptionParams($interval, $period);

        $this->request_builder->setSubscriptionParams($subscription_params);

        $this->assertSame($interval, $this->request_builder->getSubscriptionParams()->toArray()['Interval'] ?? null);
        $this->assertSame($period, $this->request_builder->getSubscriptionParams()->toArray()['Period'] ?? null);
    }
}