<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Response\Model;

use AvtoDev\CloudPayments\Message\Response\Model\SubscriptionModel;
use AvtoDev\CloudPayments\Message\Response\Model\SubscriptionsModel;
use PHPUnit\Framework\TestCase;

/**
 * @group  unit
 * @group  subscriptions-model
 *
 * @covers \AvtoDev\CloudPayments\Message\Response\Model\SubscriptionsModel
 */
class SubscriptionsModelTest extends TestCase
{
    public function test()
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

        $subscriptions_model = new SubscriptionsModel;

        $subscriptions_model->fillObjectFromArray($raw_response['Model']);

        $this->assertSame($raw_response['Model'], $subscriptions_model->toArray());

        $this->assertSame(2, count($subscriptions_model));

        $this->assertSame('sc_4bae8f5823bb8cdc966ccd1590a3b', $subscriptions_model[0]->getId());

        foreach ($subscriptions_model as $subscription_model) {
            $this->assertInstanceOf(SubscriptionModel::class, $subscription_model);
            $this->assertSame('user@example.com', $subscription_model->getAccountId());
        }

        $subscriptions_model[2] = new SubscriptionModel;
        $subscriptions_model[]  = new SubscriptionModel;

        $this->assertTrue(isset($subscriptions_model[0]));
    }
}
