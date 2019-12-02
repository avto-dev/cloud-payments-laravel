<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Strategy;

use AvtoDev\CloudPayments\Message\Response\SubscriptionsResponse;
use AvtoDev\CloudPayments\Message\Strategy\SubscriptionsStrategy;
use AvtoDev\CloudPayments\Message\Response\Model\SubscriptionsModel;

/**
 * @group unit
 * @coversNothing
 */
class SubscriptionsStrategyTest extends AbstractStrategyTest
{
    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        $this->strategy = new SubscriptionsStrategy;
    }

    public function testCorrectResponse(): void
    {
        $raw_response = [
            'Model'       => [
                [
                    'Id'                           => 'sc_4bae8f5823bb8cdc966ccd1590a3b',
                    'AccountId'                    => 'user@example.com',
                    'Description'                  => 'Подписка на сервис',
                    'Email'                        => 'user@example.com',
                    'Amount'                       => 1.02,
                    'CurrencyCode'                 => 0,
                    'Currency'                     => 'RUB',
                    'RequireConfirmation'          => false,
                    'StartDate'                    => '/Date(1473665268000)/',
                    'StartDateIso'                 => '2016-09-12T15:27:48',
                    'IntervalCode'                 => 1,
                    'Interval'                     => 'Month',
                    'Period'                       => 1,
                    'MaxPeriods'                   => null,
                    'CultureName'                  => 'ru',
                    'StatusCode'                   => 0,
                    'Status'                       => 'Active',
                    'SuccessfulTransactionsNumber' => 0,
                    'FailedTransactionsNumber'     => 0,
                    'LastTransactionDate'          => null,
                    'LastTransactionDateIso'       => null,
                    'NextTransactionDate'          => '/Date(1473665268000)/',
                    'NextTransactionDateIso'       => '2016-09-12T15:27:48',
                ],
                [
                    'Id'                           => 'sc_b4bdedba0e2bdf279be2e0bab9c99',
                    'AccountId'                    => 'user@example.com',
                    'Description'                  => 'Подписка на сервис',
                    'Email'                        => 'user@example.com',
                    'Amount'                       => 3.04,
                    'CurrencyCode'                 => 0,
                    'Currency'                     => 'RUB',
                    'RequireConfirmation'          => false,
                    'StartDate'                    => '/Date(1473665268000)/',
                    'StartDateIso'                 => '2016-09-12T15:27:48',
                    'IntervalCode'                 => 0,
                    'Interval'                     => 'Week',
                    'Period'                       => 2,
                    'MaxPeriods'                   => null,
                    'CultureName'                  => 'ru',
                    'StatusCode'                   => 0,
                    'Status'                       => 'Active',
                    'SuccessfulTransactionsNumber' => 0,
                    'FailedTransactionsNumber'     => 0,
                    'LastTransactionDate'          => null,
                    'LastTransactionDateIso'       => null,
                    'NextTransactionDate'          => '/Date(1473665268000)/',
                    'NextTransactionDateIso'       => '2016-09-12T15:27:48',
                ],
            ],
            'InnerResult' => null,
            'Success'     => true,
            'Message'     => null,
        ];

        /** @var SubscriptionsResponse $response */
        $response = $this->strategy->prepareRawResponse($raw_response);

        $this->assertTrue($response instanceof SubscriptionsResponse);
        $this->assertTrue($response->isSuccess());
        $this->assertSame($raw_response['Model'], $response->getModel()->toArray());

        /** @var SubscriptionsModel $subscriptions */
        $subscriptions = $response->getModel();
        $this->assertCount(2, $subscriptions);

        $this->assertSame('sc_4bae8f5823bb8cdc966ccd1590a3b', $subscriptions[0]->getId());
        $this->assertSame('sc_b4bdedba0e2bdf279be2e0bab9c99', $subscriptions[1]->getId());

        foreach ($response->getModel() as $subscription) {
            $this->assertSame('Active', $subscription->getStatus());
        }
    }
}
