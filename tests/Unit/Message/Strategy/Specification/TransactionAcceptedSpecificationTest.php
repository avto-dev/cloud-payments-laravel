<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Strategy\Specification;

use AvtoDev\CloudPayments\Message\Strategy\Specification\TransactionAcceptedSpecification;
use PHPUnit\Framework\TestCase;

/**
 * @group  unit
 * @group  transaction-accepted-specification
 * @covers \AvtoDev\CloudPayments\Message\Strategy\Specification\TransactionAcceptedSpecification
 */
class TransactionAcceptedSpecificationTest extends TestCase
{
    /** @var TransactionAcceptedSpecification */
    protected $specification;

    protected function setUp(): void
    {
        parent::setUp();
        $this->specification = new TransactionAcceptedSpecification;
    }

    public function testIsTrue()
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

        $this->assertTrue($this->specification->isSatisfiedBy($raw_response));
    }
}
