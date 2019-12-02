<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Feature;

use AvtoDev\CloudPayments\Message\Request\FindSubscriptionRequest;
use AvtoDev\CloudPayments\Message\Response\Model\SubscriptionModel;
use AvtoDev\CloudPayments\Message\Response\SubscriptionsResponse;

/**
 * @group feature
 * @group find-subscription
 *
 * @see   https://developers.cloudpayments.ru/#poisk-podpisok
 * @coversNothing
 */
class FindSubscriptionTest extends CreateSubscriptionTest
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
    public function test($subscription_id): void
    {
        $request = FindSubscriptionRequest::create();
        $request->getModel()
            ->setAccountId($this->account_id);

        /** @var SubscriptionsResponse $response */
        $response = $this->client->send($request);

        $this->assertInstanceOf(SubscriptionsResponse::class, $response);

        foreach ($response->getModel() as $subscription_model) {
            $this->assertInstanceOf(SubscriptionModel::class, $subscription_model);
            break;
        }
    }
}
