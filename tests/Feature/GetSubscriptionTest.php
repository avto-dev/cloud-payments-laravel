<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Feature;

use AvtoDev\CloudPayments\Message\Response\SubscriptionResponse;
use AvtoDev\CloudPayments\Message\Request\GetSubscriptionRequest;

/**
 * @group feature
 * @group get-subscription
 *
 * @see   https://developers.cloudpayments.ru/#zapros-informatsii-o-podpiske
 * @coversNothing
 */
class GetSubscriptionTest extends CreateSubscriptionTest
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
    public function testGetSubscription(string $subscription_id): void
    {
        $request = GetSubscriptionRequest::create();
        $request->getModel()
            ->setId($subscription_id);

        /** @var SubscriptionResponse $response */
        $response = $this->client->send($request);

        $this->assertInstanceOf(SubscriptionResponse::class, $response);
    }
}
