<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Feature;

use AvtoDev\CloudPayments\Message\Response\SuccessResponse;
use AvtoDev\CloudPayments\Message\Request\CancelSubscriptionRequest;

/**
 * @group feature
 * @group cancel-subscription
 *
 * @see   https://developers.cloudpayments.ru/#otmena-podpiski-na-rekurrentnye-platezhi
 * @coversNothing
 */
class CancelGetSubscriptionTest extends CreateSubscriptionTest
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
    public function testCancelGetSubscription($subscription_id): void
    {
        $request = CancelSubscriptionRequest::create();
        $request->getModel()
            ->setId($subscription_id);

        /** @var SuccessResponse $response */
        $response = $this->client->send($request);

        $this->assertInstanceOf(SuccessResponse::class, $response);
    }
}
