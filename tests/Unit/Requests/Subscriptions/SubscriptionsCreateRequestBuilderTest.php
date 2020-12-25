<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Requests\Subscriptions;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Uri;
use Illuminate\Support\Str;
use Tarampampam\Wrappers\Json;
use Psr\Http\Message\UriInterface;
use AvtoDev\CloudPayments\Receipts\Receipt;
use AvtoDev\Tests\Unit\Requests\AbstractRequestBuilderTestCase;
use AvtoDev\CloudPayments\Requests\Subscriptions\SubscriptionsCreateRequestBuilder;

/**
 * @covers \AvtoDev\CloudPayments\Requests\Subscriptions\SubscriptionsCreateRequestBuilder
 */
class SubscriptionsCreateRequestBuilderTest extends AbstractRequestBuilderTestCase
{
    /**
     * @var SubscriptionsCreateRequestBuilder
     */
    protected $request_builder;

    public function testFields(): void
    {
        $this->assertEmpty($this->request_builder->buildRequest()->getBody()->getContents());

        $fields = [
            'Token'               => Str::random(),
            'AccountId'           => Str::random(),
            'Description'         => Str::random(),
            'Email'               => Str::random(),
            'Amount'              => (float) random_int(0, 100) + 0.1,
            'Currency'            => Str::random(),
            'RequireConfirmation' => (bool) random_int(0, 1),
            'Interval'            => Str::random(),
            'Period'              => random_int(0, 100),
            'MaxPeriods'          => random_int(0, 100),
        ];

        foreach ($fields as $field => $value) {
            $this->request_builder->{'set' . $field}($value);

            $request_data = Json::decode($this->request_builder->buildRequest()->getBody()->getContents());
            $this->assertArrayHasKey($field, $request_data);
            $this->assertSame($value, $request_data[$field]);
        }
    }

    public function testStartDay(): void
    {
        $this->assertEmpty($this->request_builder->buildRequest()->getBody()->getContents());
        $carbon_now = Carbon::now();

        $this->request_builder->setStartDate($carbon_now);

        $request_data = Json::decode($this->request_builder->buildRequest()->getBody()->getContents());

        $this->assertArrayHasKey('StartDate', $request_data);

        $this->assertSame($carbon_now->toRfc3339String(), $request_data['StartDate']);
    }

    public function testCustomerReceipt(): void
    {
        $this->assertEmpty($this->request_builder->buildRequest()->getBody()->getContents());
        $receipt = new Receipt;

        $this->request_builder->setCustomerReceipt($receipt);

        $this->assertSame(
            Json::encode(['CustomerReceipt' => $receipt->toArray()]),
            $this->request_builder->buildRequest()->getBody()->getContents()
        );
    }

    protected function getRequestBuilder()
    {
        return new SubscriptionsCreateRequestBuilder;
    }

    protected function getUri(): UriInterface
    {
        return new Uri('https://api.cloudpayments.ru/subscriptions/create');
    }
}
