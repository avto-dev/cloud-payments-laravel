<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Feature;

use AvtoDev\CloudPayments\Message\Request\CryptogramPaymentOneStepRequest;
use AvtoDev\CloudPayments\Message\Response\Cryptogram3dSecureAuthRequiredResponse;
use AvtoDev\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse;
use AvtoDev\CloudPayments\Message\Response\CryptogramTransactionRejectedResponse;
use AvtoDev\CloudPayments\Message\Response\InvalidRequestResponse;
use Illuminate\Support\Arr;

/**
 * @group feature
 * @group cryptogram-payment
 *
 * @see   https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 * @coversNothing
 */
class CryptogramPaymentTest extends AbstractFeatureTest
{
    public function testSuccessPaymentWith3d(): void
    {
        $request = CryptogramPaymentOneStepRequest::create();
        $request->getModel()
            ->setAmount(100.0)
            ->setCurrency('RUB')
            ->setIpAddress('127.0.0.1')
            ->setName('CARDHOLDER NAME')
            ->setCardCryptogramPacket(Arr::get($this->card_cryptograms, 'CARD_CRYPTOGRAM_PACKET_WITH_3D_SUCCESS'));

        /** @var Cryptogram3dSecureAuthRequiredResponse $response */
        $response = $this->client->send($request);

        $this->assertInstanceOf(Cryptogram3dSecureAuthRequiredResponse::class, $response);
    }

    public function testSuccessPaymentWithout3d(): void
    {
        $request = CryptogramPaymentOneStepRequest::create();
        $request->getModel()
            ->setAmount(100.0)
            ->setCurrency('RUB')
            ->setIpAddress('127.0.0.1')
            ->setName('CARDHOLDER NAME')
            ->setCardCryptogramPacket(Arr::get($this->card_cryptograms,
                'CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_SUCCESS_MASTER_CARD'));

        /** @var CryptogramTransactionAcceptedResponse $response */
        $response = $this->client->send($request);

        $this->assertInstanceOf(CryptogramTransactionAcceptedResponse::class, $response);
    }

    public function testFailPaymentWithout3d(): void
    {
        $request = CryptogramPaymentOneStepRequest::create();
        $request->getModel()
            ->setAmount(100.0)
            ->setCurrency('RUB')
            ->setIpAddress('127.0.0.1')
            ->setName('CARDHOLDER NAME')
            ->setCardCryptogramPacket(Arr::get($this->card_cryptograms, 'CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_FAIL'));

        /** @var CryptogramTransactionRejectedResponse $response */
        $response = $this->client->send($request);

        $this->assertInstanceOf(CryptogramTransactionRejectedResponse::class, $response);
        $this->assertSame('InsufficientFunds', $response->getModel()->getReason());
        $this->assertSame(5051, $response->getModel()->getReasonCode());
    }

    public function testInvalidRequest(): void
    {
        $request = CryptogramPaymentOneStepRequest::create();
        $request->getModel()
            ->setAmount(0)
            ->setCurrency('RUB')
            ->setIpAddress('127.0.0.1')
            ->setName('CARDHOLDER NAME')
            ->setCardCryptogramPacket(Arr::get($this->card_cryptograms,
                'CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_SUCCESS_MASTER_CARD'));

        /** @var InvalidRequestResponse $response */
        $response = $this->client->send($request);

        $this->assertInstanceOf(InvalidRequestResponse::class, $response);
        $this->assertSame('Amount is required; Amount value is too small', $response->getMessage());
    }
}
