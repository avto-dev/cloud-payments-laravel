<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Frameworks\Laravel;

use AvtoDev\Tests\Traits\CreatesApplicationTrait;
use Illuminate\Support\Str;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use AvtoDev\CloudPayments\Client;
use Psr\Http\Client\ClientInterface;
use GuzzleHttp\Client as GuzzleClient;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use AvtoDev\CloudPayments\Frameworks\Laravel\ServiceProvider;
use Illuminate\Contracts\Config\Repository;
use Tarampampam\GuzzleUrlMock\UrlsMockHandler;
use Illuminate\Foundation\Testing\TestCase;

/**
 * @covers \AvtoDev\CloudPayments\Frameworks\Laravel\ServiceProvider
 */
class ServiceProviderTest extends TestCase
{
    use CreatesApplicationTrait;

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

    public function testRegister(): void
    {
        $this->assertFalse($this->app->bound(Client::class));

        $this->app->register(ServiceProvider::class);

        $this->assertTrue($this->app->bound(Client::class));

        $this->handler->onUriRequested('https://example.com', 'GET', new Response);

        /** @var Client $client */
        $client = $this->app->make(Client::class);

        $client->send(new Request('GET', 'https://example.com'));

        $this->assertSame(
            'Basic ' . base64_encode($this->config['public_id'] . ':' . $this->config['api_key']),
            $this->handler->getLastRequest()->getHeader('Authorization')[0]
        );
    }

    public function testRegisterByClientInterface(): void
    {
        $stack = HandlerStack::create($this->handler);

        $stack->push(function (callable $handler) {
            return function (
                RequestInterface $request,
                array $options
            ) use ($handler) {
                $promise = $handler($request, $options);

                return $promise->then(
                    function (ResponseInterface $response) {
                        return $response->withHeader('test', 'value');
                    }
                );
            };
        });

        $client_instance = new GuzzleClient(['handler' => $stack]);

        $this->handler->onUriRequested('https://example.com', 'GET', new Response);

        $this->app->instance(ClientInterface::class, $client_instance);
        $this->app->register(ServiceProvider::class);

        /** @var Client $client */
        $client = $this->app->make(Client::class);

        $response = $client->send(new Request('GET', 'https://example.com'));

        $this->assertSame('value', $response->getHeader('test')[0]);
    }
}
