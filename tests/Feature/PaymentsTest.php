<?php

namespace AvtoDev\Tests\Feature;

use Carbon\Carbon;
use Tarampampam\Wrappers\Json;
use AvtoDev\CloudPayments\References\Currency;
use AvtoDev\CloudPayments\Requests\Payments\Cards\CardsAuthRequestBuilder;
use AvtoDev\CloudPayments\Requests\Subscriptions\SubscriptionsCancelRequestBuilder;
use AvtoDev\CloudPayments\Requests\Subscriptions\SubscriptionsCreateRequestBuilder;

/**
 * @coversNothing
 */
class PaymentsTest extends AbstractFeatureTestCase
{
    public function testPayment(): void
    {
        $account_id = 'WnZFWlh4MS9QRmVkMm5BNlpJRVFFUT09';
        $crypto     =
            '014111111111220102DzwMpc624exgU7cNsKjDrWx3EmwORzVmjALXJ3b/8+ZnQ7dlvzLbawxrftBJUhbY37a8+qVdxmjlgA4MsC4G6ed'
            . 'idrrGKZD3bwX6+4noPK2AJ31b1lSJ9PTMnhS1vZJLdD9nNgVKUo+fnkHxcXrjuK7/t/7W85jhOn/vcj03y9bWmI7cB732iYeU1yQyxO'
            . '4lnALESsp4O8urNJEn9TVvJtnL8BaAPN5kGfkjNuRkJouyy0Io3TRUYcmbxtK7RxDa4P4HaZ9YA28c49uk8OlD1IdBf9DNc+VdEtoVvr'
            . '/YsfgmgPVe/nvE4tGeWDmkQLmMbDhgxEmtQMViEko6IILzfA==';

        $request_builder = new CardsAuthRequestBuilder;
        $request_builder
            ->setAccountId($account_id)
            ->setAmount(100)
            ->setCardCryptogramPacket($crypto)
            ->setCurrency(Currency::RUB)
            ->setIpAddress('127.0.0.1');

        $response = $this->cloud_payments_client->send($request_builder->buildRequest());

        $response_data = Json::decode($response->getBody()->getContents());

        $this->assertTrue($response_data['Success']);
    }

    public function testSubscription(): void
    {
        $token = '9BBEF19476623CA56C17DA75FD57734DBF82530686043A6E491C6D71BEFE8F6E';

        $request_builder = new SubscriptionsCreateRequestBuilder;
        $request_builder
            ->setToken($token)
            ->setAccountId('WnZFWlh4MS9QRmVkMm5BNlpJRVFFUT09')
            ->setDescription('Some test')
            ->setEmail('some@example.com')
            ->setAmount(100)
            ->setCurrency(Currency::RUB)
            ->setRequireConfirmation(false)
            ->setStartDate(Carbon::now()->addMonth())
            ->setInterval('week')
            ->setPeriod(1);

        $response = $this->cloud_payments_client->send($request_builder->buildRequest());

        $response_data = Json::decode($response->getBody()->getContents());
        $this->assertTrue($response_data['Success']);

        $request_builder = new SubscriptionsCancelRequestBuilder;

        $request_builder->setId($response_data['Model']['Id']);

        $this->cloud_payments_client->send($request_builder->buildRequest());
    }
}
