<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Feature;

use AvtoDev\CloudPayments\Message\Request\CreateSubscriptionRequest;
use AvtoDev\CloudPayments\Message\Request\CryptogramPaymentOneStepRequest;
use AvtoDev\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse;
use AvtoDev\CloudPayments\Message\Response\SubscriptionResponse;
use Illuminate\Support\Arr;

/**
 * @group feature
 * @group create-subscription
 *
 * @see   https://developers.cloudpayments.ru/#sozdanie-podpiski-na-rekurrentnye-platezhi
 * @coversNothing
 */
class CreateSubscriptionTest extends AbstractFeatureTest
{
    /** @var string */
    protected $account_id = '44234234234';

    public function testCreateSubscription(): string
    {
        /**
         * @var CryptogramPaymentOneStepRequest
         */
        $request = CryptogramPaymentOneStepRequest::create();
        $request->getModel()
            ->setAmount(100.0)
            ->setCurrency('RUB')
            ->setIpAddress('127.0.0.1')
            ->setAccountId($this->account_id)
            ->setName('CARDHOLDER NAME')
            ->setCardCryptogramPacket(Arr::get($this->card_cryptograms,
                'CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_SUCCESS_VISA'));

        /** @var CryptogramTransactionAcceptedResponse $response */
        $response = $this->client->send($request);

        $this->assertInstanceOf(CryptogramTransactionAcceptedResponse::class, $response);

        /**
         * @var CreateSubscriptionRequest
         */
        $request = CreateSubscriptionRequest::create();
        $request->getModel()
            ->setToken($response->getModel()->getToken())
            ->setAccountId($this->account_id)
            ->setDescription('Ежемесячная подписка на сервис example.com')
            ->setEmail('user@example.com')
            ->setAmount(100.0)
            ->setCurrency('RUB')
            ->setRequireConfirmation(false)
            ->setStartDate((new \DateTime('+1day'))->format('Y-m-d\Th:i:s.u\Z'))
            ->setInterval('Month')
            ->setPeriod(1);

        /** @var SubscriptionResponse $response */
        $response = $this->client->send($request);

        $this->assertInstanceOf(SubscriptionResponse::class, $response);

        return $response->getModel()->getId();
    }
}
