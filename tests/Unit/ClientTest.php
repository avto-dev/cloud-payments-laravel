<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit;

use Illuminate\Support\Str;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use AvtoDev\CloudPayments\Client;
use AvtoDev\CloudPayments\Config;
use AvtoDev\Tests\AbstractTestCase;
use AvtoDev\GuzzleUrlMock\UrlsMockHandler;
use AvtoDev\CloudPayments\Exceptions\CloudPaymentsRequestException;

/**
 * @covers \AvtoDev\CloudPayments\Client
 */
class ClientTest extends AbstractTestCase
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var Config
     */
    protected $config;

    /**
     * @var UrlsMockHandler
     */
    protected $handler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new UrlsMockHandler;

        $this->config = new Config(Str::random(), Str::random());

        $this->client =
            new Client(new \GuzzleHttp\Client(['handler' => HandlerStack::create($this->handler)]), $this->config);
    }

    public function testClientSend(): void
    {
        $request = new Request('GET', 'https://example.com');

        $this->handler->onUriRequested('https://example.com', 'GET', new Response(200, ['test' => 'val']));

        $response = $this->client->send($request);

        $this->assertSame('val', $response->getHeader('test')[0]);

        $this->assertSame(
            'Basic ' . base64_encode($this->config->getPublicId() . ':' . $this->config->getApiKey()),
            $this->handler->getLastRequest()->getHeader('Authorization')[0]
        );
    }

    public function testClientSendFail(): void
    {
        $this->expectException(CloudPaymentsRequestException::class);

        $request = new Request('GET', 'https://example.com');

        $this->handler->onUriRequested('https://example.com', 'GET', new Response(500, ['test' => 'val']));

        $this->client->send($request);
    }
}
