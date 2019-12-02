<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\ClientInterface as GuzzleHttpClientInterface;
use AvtoDev\CloudPayments\Client\Client;
use AvtoDev\CloudPayments\Client\ClientInterface;
use AvtoDev\Tests\AbstractTestCase;

/**
 * @group  unit
 * @group  service-provider
 * @covers \AvtoDev\CloudPayments\ServiceProvider
 */
class CloudPaymentsServiceProviderTest extends AbstractTestCase
{
    public function test()
    {

        $this->app->bind(GuzzleHttpClientInterface::class, function () {
            return new GuzzleHttpClient;
        });

        $cloud_payment_client           = $this->app->make(Client::class);
        $cloud_payment_client_interface = $this->app->make(ClientInterface::class);

        $this->assertInstanceOf(Client::class, $cloud_payment_client);
        $this->assertInstanceOf(ClientInterface::class, $cloud_payment_client_interface);
    }
}
