<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Strategy\Specification;

use AvtoDev\CloudPayments\Message\Strategy\Specification\SubscriptionSpecification;
use PHPUnit\Framework\TestCase;

/**
 * @group  unit
 * @group  subscription-specification
 * @covers \AvtoDev\CloudPayments\Message\Strategy\Specification\SubscriptionSpecification
 */
class SubscriptionSpecificationTest extends TestCase
{
    /** @var SubscriptionSpecification */
    protected $specification;

    protected function setUp(): void
    {
        parent::setUp();
        $this->specification = new SubscriptionSpecification;
    }

    public function testIsTrue()
    {
        $raw_response = [
            'Model'   => [
                'Id'                           => 'sc_8cf8a9338fb8ebf7202b08d09c938', //идентификатор подписки
                'AccountId'                    => 'user@example.com',
                'Description'                  => 'Ежемесячная подписка на сервис example.com',
                'Email'                        => 'user@example.com',
                'Amount'                       => 1.02,
                'CurrencyCode'                 => 0,
                'Currency'                     => 'RUB',
                'RequireConfirmation'          => false, //true для двустадийных платежей
                'StartDate'                    => '\/Date(1407343589537)\/',
                'StartDateIso'                 => '2014-08-09T11:49:41', //все даты в UTC
                'IntervalCode'                 => 1,
                'Interval'                     => 'Month',
                'Period'                       => 1,
                'MaxPeriods'                   => null,
                'CultureName'                  => null,
                'StatusCode'                   => 0,
                'Status'                       => 'Active',
                'SuccessfulTransactionsNumber' => 0,
                'FailedTransactionsNumber'     => 0,
                'LastTransactionDate'          => null,
                'LastTransactionDateIso'       => null,
                'NextTransactionDate'          => '\/Date(1407343589537)\/',
                'NextTransactionDateIso'       => '2014-08-09T11:49:41',
            ],
            'Success' => true,
        ];

        $this->assertTrue($this->specification->isSatisfiedBy($raw_response));
    }
}
