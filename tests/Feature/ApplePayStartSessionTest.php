<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Feature;

use AvtoDev\CloudPayments\Message\Response\InvalidRequestResponse;
use AvtoDev\CloudPayments\Message\Request\ApplePayStartSessionRequest;
use AvtoDev\CloudPayments\Message\Response\ApplePayStartSessionResponse;

/**
 * @group feature
 * @group apple-pay-start-session
 *
 * @see https://developers.cloudpayments.ru/#zapusk-sessii-dlya-oplaty-cherez-apple-pay
 * @coversNothing
 */
class ApplePayStartSessionTest extends AbstractFeatureTest
{
    public function test(): void
    {
        $request = ApplePayStartSessionRequest::create();
        $request->getModel()
            ->setValidationUrl('https://apple-pay-gateway.apple.com/paymentservices/startSession');

        $response = $this->client->send($request);

        if ($response instanceof ApplePayStartSessionResponse) {
            $this->assertTrue(true);
        } elseif ($response instanceof InvalidRequestResponse) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
}
