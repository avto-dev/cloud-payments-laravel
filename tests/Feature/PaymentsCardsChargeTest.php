<?php

namespace AvtoDev\Tests\Feature;

use AvtoDev\CloudPayments\Exceptions\InvalidRequestException;
use AvtoDev\CloudPayments\Requests\Payments\Cards\CardsAuthRequestBuilder;
use AvtoDev\CloudPayments\ResponseParser;

/**
 * @coversNothing
 */
class PaymentsCardsChargeTest extends AbstractFeatureTestCase
{
    public function testInvelidFormatTest()
    {
        $request = new CardsAuthRequestBuilder;

        $this->expectException(InvalidRequestException::class);
        $response = $this->cloud_payments_client->send($request->buildRequest());

        ResponseParser::parsePaymentResponse($response);
    }
}
