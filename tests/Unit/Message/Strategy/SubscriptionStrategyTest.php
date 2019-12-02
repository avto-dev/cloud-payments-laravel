<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Strategy;

use AvtoDev\CloudPayments\Message\Response\SubscriptionResponse;
use AvtoDev\CloudPayments\Message\Strategy\SubscriptionStrategy;

/**
 * @group unit
 * @coversNothing
 */
class SubscriptionStrategyTest extends AbstractStrategyTest
{
    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        $this->strategy = new SubscriptionStrategy;
    }

    public function testCorrectResponse(): void
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

        /** @var SubscriptionResponse $response */
        $response = $this->strategy->prepareRawResponse($raw_response);

        $this->assertTrue($response instanceof SubscriptionResponse);
        $this->assertTrue($response->isSuccess());
        $this->assertSame($raw_response['Model'], $response->getModel()->toArray());
        $this->assertSame('sc_8cf8a9338fb8ebf7202b08d09c938', $response->getModel()->getId());
    }
}
