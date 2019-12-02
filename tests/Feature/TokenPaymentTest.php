<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Feature;

use Illuminate\Support\Arr;
use AvtoDev\CloudPayments\Message\Request\TokenPaymentOneStepRequest;
use AvtoDev\CloudPayments\Message\Request\CryptogramPaymentOneStepRequest;
use AvtoDev\CloudPayments\Message\Response\TokenTransactionRejectedResponse;
use AvtoDev\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse;

/**
 * @group feature
 * @group token-payment
 *
 * @see   https://developers.cloudpayments.ru/#oplata-po-tokenu-rekarring
 * @coversNothing
 */
class TokenPaymentTest extends AbstractFeatureTest
{
    /** @var float */
    protected $amount = 100.0;

    /** @var string */
    protected $currency = 'RUB';

    /** @var string */
    protected $account_id = 'user_x';

    /** @var string */
    protected $ip_address = '127.0.0.1';

    public function test(): void
    {
        $request = CryptogramPaymentOneStepRequest::create();
        $request->getModel()
            ->setAmount($this->amount)
            ->setCurrency($this->currency)
            ->setAccountId($this->account_id)
            ->setIpAddress($this->ip_address)
            ->setName('CARDHOLDER NAME')
            ->setCardCryptogramPacket(Arr::get($this->card_cryptograms,'CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_SUCCESS_VISA'));

        /** @var CryptogramTransactionAcceptedResponse $response */
        $response = $this->client->send($request);

        $this->assertInstanceOf(CryptogramTransactionAcceptedResponse::class, $response);

        $token = $response->getModel()->getToken();

        $request = TokenPaymentOneStepRequest::create();
        $request->getModel()
            ->setAmount($this->amount)
            ->setCurrency($this->currency)
            ->setAccountId($this->account_id)
            ->setToken($token);

        /** @var TokenTransactionRejectedResponse $response */
        $response = $this->client->send($request);

        $this->assertInstanceOf(TokenTransactionRejectedResponse::class, $response);
    }
}
