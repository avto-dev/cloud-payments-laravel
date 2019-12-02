<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Strategy;

use PHPUnit\Framework\TestCase;
use AvtoDev\CloudPayments\Message\Response\InvalidRequestResponse;
use AvtoDev\CloudPayments\Message\Strategy\CryptogramPaymentStrategy;
use AvtoDev\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse;
use AvtoDev\CloudPayments\Message\Response\CryptogramTransactionRejectedResponse;
use AvtoDev\CloudPayments\Message\Response\Cryptogram3dSecureAuthRequiredResponse;

/**
 * @group unit
 * @coversNothing
 */
class CryptogramPaymentStrategyTest extends TestCase
{
    /** @var CryptogramPaymentStrategy */
    protected $strategy;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        $this->strategy = new CryptogramPaymentStrategy;
    }

    public function testPrepareInvalidRequestResponse(): void
    {
        $raw_response = [
            'Success' => false,
            'Message' => 'Amount is required',
        ];

        $response = $this->strategy->prepareRawResponse($raw_response);

        $this->assertTrue($response instanceof InvalidRequestResponse);
        $this->assertSame('Amount is required', $response->getMessage());
        $this->assertFalse($response->isSuccess());
    }

    public function testPrepareCryptogram3dSecureAuthRequiredResponse(): void
    {
        $raw_response = [
            'Model'   => [
                'TransactionId' => 504,
                'PaReq'         => 'RXDe9mLgo0Z1nhpU9PQasWmPhLYAKksuEChfn13uVR9mGTO7MzZM2dg3qSn0Q',
                'AcsUrl'        => 'https://test.paymentgate.ru/acs/auth/start.do',
            ],
            'Success' => false,
            'Message' => null,
        ];

        /** @var Cryptogram3dSecureAuthRequiredResponse $response */
        $response = $this->strategy->prepareRawResponse($raw_response);

        $this->assertTrue($response instanceof Cryptogram3dSecureAuthRequiredResponse);
        $this->assertFalse($response->isSuccess());
        $this->assertSame($raw_response['Model'], $response->getModel()->toArray());
        $this->assertSame(504, $response->getModel()->getTransactionId());
    }

    public function testPrepareTransactionRejectedResponse(): void
    {
        $raw_response = [
            'Model'   => [
                'TransactionId'       => 504,
                'Amount'              => 10.00000,
                'Currency'            => 'RUB',
                'CurrencyCode'        => 0,
                'PaymentAmount'       => 10.00000,
                'PaymentCurrency'     => 'RUB',
                'PaymentCurrencyCode' => 0,
                'InvoiceId'           => '1234567',
                'AccountId'           => 'user_x',
                'Email'               => null,
                'Description'         => 'Оплата товаров в example.com',
                'JsonData'            => null,
                'CreatedDate'         => '\/Date(1401718880000)\/',
                'CreatedDateIso'      => '2014-08-09T11:49:41', //все даты в UTC
                'TestMode'            => true,
                'IpAddress'           => '195.91.194.13',
                'IpCountry'           => 'RU',
                'IpCity'              => 'Уфа',
                'IpRegion'            => 'Республика Башкортостан',
                'IpDistrict'          => 'Приволжский федеральный округ',
                'IpLatitude'          => 54.7355,
                'IpLongitude'         => 55.991982,
                'CardFirstSix'        => '411111',
                'CardLastFour'        => '1111',
                'CardExpDate'         => '05/19',
                'CardType'            => 'Visa',
                'CardTypeCode'        => 0,
                'Issuer'              => 'Sberbank of Russia',
                'IssuerBankCountry'   => 'RU',
                'Status'              => 'Declined',
                'StatusCode'          => 5,
                'Reason'              => 'InsufficientFunds', // причина отказа
                'ReasonCode'          => 5051, //код отказа
                'CardHolderMessage'   => 'Недостаточно средств на карте', //сообщение для покупателя
                'Name'                => 'CARDHOLDER NAME',
            ],
            'Success' => false,
            'Message' => null,
        ];

        /** @var CryptogramTransactionRejectedResponse $response */
        $response = $this->strategy->prepareRawResponse($raw_response);

        $this->assertTrue($response instanceof CryptogramTransactionRejectedResponse);
        $this->assertFalse($response->isSuccess());
        $this->assertSame($raw_response['Model'], $response->getModel()->toArray());
        $this->assertSame(5051, $response->getModel()->getReasonCode());
    }

    public function testPrepareTransactionAcceptedResponse(): void
    {
        $raw_response = [
            'Model'   => [
                'TransactionId'     => 504,
                'Amount'            => 10.00000,
                'Currency'          => 'RUB',
                'CurrencyCode'      => 0,
                'InvoiceId'         => '1234567',
                'AccountId'         => 'user_x',
                'Email'             => null,
                'Description'       => 'Оплата товаров в example.com',
                'JsonData'          => null,
                'CreatedDate'       => '\/Date(1401718880000)\/',
                'CreatedDateIso'    => '2014-08-09T11:49:41', //все даты в UTC
                'AuthDate'          => '\/Date(1401733880523)\/',
                'AuthDateIso'       => '2014-08-09T11:49:42',
                'ConfirmDate'       => '\/Date(1401733880523)\/',
                'ConfirmDateIso'    => '2014-08-09T11:49:42',
                'AuthCode'          => '123456',
                'TestMode'          => true,
                'IpAddress'         => '195.91.194.13',
                'IpCountry'         => 'RU',
                'IpCity'            => 'Уфа',
                'IpRegion'          => 'Республика Башкортостан',
                'IpDistrict'        => 'Приволжский федеральный округ',
                'IpLatitude'        => 54.7355,
                'IpLongitude'       => 55.991982,
                'CardFirstSix'      => '411111',
                'CardLastFour'      => '1111',
                'CardExpDate'       => '05/19',
                'CardType'          => 'Visa',
                'CardTypeCode'      => 0,
                'Issuer'            => 'Sberbank of Russia',
                'IssuerBankCountry' => 'RU',
                'Status'            => 'Completed',
                'StatusCode'        => 3,
                'Reason'            => 'Approved',
                'ReasonCode'        => 0,
                'CardHolderMessage' => 'Оплата успешно проведена', //сообщение для покупателя
                'Name'              => 'CARDHOLDER NAME',
                'Token'             => 'a4e67841-abb0-42de-a364-d1d8f9f4b3c0',
            ],
            'Success' => true,
            'Message' => null,
        ];

        /** @var CryptogramTransactionAcceptedResponse $response */
        $response = $this->strategy->prepareRawResponse($raw_response);

        $this->assertTrue($response instanceof CryptogramTransactionAcceptedResponse);
        $this->assertTrue($response->isSuccess());
        $this->assertSame($raw_response['Model'], $response->getModel()->toArray());
        $this->assertSame(3, $response->getModel()->getStatusCode());
    }
}
