<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Feature;

use AvtoDev\CloudPayments\Message\Request\CryptogramPaymentOneStepRequest;
use AvtoDev\CloudPayments\Message\Request\RefundPaymentRequest;
use AvtoDev\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse;
use AvtoDev\CloudPayments\Message\Response\RefundPaymentResponse;
use Illuminate\Support\Arr;

/**
 * @group feature
 * @group refund-payment
 *
 * @see   https://developers.cloudpayments.ru/#vozvrat-deneg
 *
 * @coversNothing
 */
class RefundPaymentTest extends AbstractFeatureTest
{
    /** @var string */
    protected $account_id = '44234234234';

    public function test(): void
    {
        $cryptogram_payment_one_step_request = CryptogramPaymentOneStepRequest::create();
        $cryptogram_payment_one_step_request
            ->setClient($this->client)
            ->getModel()
            ->setAmount(1.0)
            ->setCurrency('RUB')
            ->setAccountId($this->account_id)
            ->setIpAddress('127.0.0.1')
            ->setName('CARDHOLDER NAME')
            ->setCardCryptogramPacket(Arr::get($this->card_cryptograms,
                'CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_SUCCESS_MASTER_CARD'));

        $cryptogram_transaction_accepted_response = $cryptogram_payment_one_step_request->send();

        $this->assertInstanceOf(CryptogramTransactionAcceptedResponse::class,
            $cryptogram_transaction_accepted_response);

        $refund_payment_request = RefundPaymentRequest::create();
        $refund_payment_request
            ->setClient($this->client)
            ->getModel()
            ->setTransactionId($cryptogram_transaction_accepted_response->getModel()->getTransactionId())
            ->setAmount($cryptogram_transaction_accepted_response->getModel()->getAmount());

        $refund_payment_response = $refund_payment_request->send();

        $this->assertInstanceOf(RefundPaymentResponse::class, $refund_payment_response);
    }
}
