<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Feature;

use AvtoDev\CloudPayments\Message\Response\SubscriptionResponse;
use AvtoDev\CloudPayments\Message\Request\UpdateSubscriptionRequest;

/**
 * @group feature
 * @group update-subscription
 *
 * @see   https://developers.cloudpayments.ru/#izmenenie-podpiski-na-rekurrentnye-platezhi
 * @coversNothing
 */
class UpdateSubscriptionTest extends CreateSubscriptionTest
{
    public function testCreateSubscription(): string
    {
        return parent::testCreateSubscription();
    }

    /**
     * The test depends on testCreateSubscription. The first step is to create a subscription.
     *
     * @param string $subscription_id
     *
     * @depends testCreateSubscription
     */
    public function testUpdateSubscription($subscription_id): void
    {
        $request = UpdateSubscriptionRequest::create();
        $request->getModel()
            ->setId($subscription_id)
            ->setDescription('new price')
            ->setAmount(1200);

        /** @var SubscriptionResponse $response */
        $response = $this->client->send($request);

        $this->assertInstanceOf(SubscriptionResponse::class, $response);
    }
}
