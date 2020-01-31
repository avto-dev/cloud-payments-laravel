<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit;

use AvtoDev\CloudPayments\Client;
use AvtoDev\CloudPayments\ServiceProvider;
use AvtoDev\Tests\AbstractTestCase;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Support\Str;
use Tarampampam\GuzzleUrlMock\UrlsMockHandler;

/**
 * @covers \AvtoDev\CloudPayments\ServiceProvider
 */
class ServiceProviderTest extends AbstractTestCase
{
    /**
     * @var UrlsMockHandler
     */
    protected $handler;

    /**
     * @var array
     */
    protected $config;

    protected function setUp(): void
    {
        parent::setUp();
        /** @var Repository $config */
        $config = $this->app->make(Repository::class);

        $this->config = [
            'api_key'   => Str::random(),
            'public_id' => Str::random(),
        ];

        $config->set('services.cloud_payments', $this->config);

        $this->handler = new UrlsMockHandler;

        $this->app->instance(
            GuzzleClient::class,
            new GuzzleClient(['handler' => HandlerStack::create($this->handler)])
        );
    }

    public function testRegister()
    {
        $this->assertFalse($this->app->bound(Client::class));

        $this->app->register(ServiceProvider::class);

        $this->assertTrue($this->app->bound(Client::class));

        $this->handler->onUriRequested('https://example.com', 'GET', new Response);

        /** @var Client $client */
        $client = $this->app->make(Client::class);

        $client->send(new Request('GET', 'https://example.com'));

        $this->assertSame(
            [$this->config['public_id'], $this->config['api_key']],
            $this->handler->getLastOptions()['auth']
        );
    }
}
