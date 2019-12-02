<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Feature;

use Illuminate\Support\Arr;
use AvtoDev\CloudPayments\Message\Request\CancelPaymentRequest;
use AvtoDev\CloudPayments\Message\Request\CryptogramPaymentTwoStepRequest;
use AvtoDev\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse;
use AvtoDev\CloudPayments\Message\Response\SuccessResponse;

/**
 * @group feature
 * @group payment-cancel
 *
 * @see   https://developers.cloudpayments.ru/#otmena-oplaty
 * @coversNothing
 */
class PaymentCancelTest extends AbstractFeatureTest
{
    public function test(): void
    {
        $cryptogram_payment_two_step_request = CryptogramPaymentTwoStepRequest::create();
        $cryptogram_payment_two_step_request
            ->setClient($this->client)
            ->getModel()
            ->setAmount(1.0)
            ->setCurrency('RUB')
            ->setAccountId('44234234234')
            ->setIpAddress('127.0.0.1')
            ->setName('CARDHOLDER NAME')
            ->setCardCryptogramPacket(Arr::get($this->card_cryptograms,
                'CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_SUCCESS_MASTER_CARD'));

        $cryptogram_transaction_accepted_response = $cryptogram_payment_two_step_request->send();

        $this->assertInstanceOf(CryptogramTransactionAcceptedResponse::class,
            $cryptogram_transaction_accepted_response);

        $cancel_payment_request = CancelPaymentRequest::create();

        $cancel_payment_request
            ->setClient($this->client)
            ->getModel()
            ->setTransactionId($cryptogram_transaction_accepted_response->getModel()->getTransactionId());

        $success_response = $cancel_payment_request->send();

        $this->assertInstanceOf(SuccessResponse::class, $success_response);
    }
}
