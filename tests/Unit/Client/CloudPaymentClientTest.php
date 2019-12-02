<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Client;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use AvtoDev\CloudPayments\Client\Exception\InvalidHttpResponseCodeException;
use AvtoDev\CloudPayments\Message\Request\RequestInterface;
use PHPUnit\Framework\MockObject\MockObject;
use Tarampampam\Wrappers\Json;
use GuzzleHttp\ClientInterface as GuzzleHttpClientInterface;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\ResponseInterface;
use AvtoDev\CloudPayments\Client\Client;
use AvtoDev\CloudPayments\Client\ClientInterface;

/**
 * @group unit
 * @group cloud-payment-client
 * @coversDefaultClass \AvtoDev\CloudPayments\Client\Client
 */
class CloudPaymentClientTest extends TestCase
{
    /** @var RequestInterface|MockObject RequestInterface */
    protected $request;

    protected function setUp(): void
    {
        parent::setUp();
        $this->request = $this->createMock(RequestInterface::class);
        $this->request->method('getMethod')
            ->willReturn('POST');
    }

    public function testSuccessRequest()
    {
        $raw_response = [
            'Success' => true,
            'Message' => null,
        ];

        $cloud_payment_client = $this->createCloudPaymentClient($raw_response, 200);

        $cloud_payment_client->send($this->request);

        $this->assertTrue(true);
    }

    /**
     * invalid response code
     */
    public function testFailRequest()
    {
        $cloud_payment_client = $this->createCloudPaymentClient([], 404);

        $this->expectException(InvalidHttpResponseCodeException::class);
        $cloud_payment_client->send($this->request);

        $this->assertTrue(true);
    }

    /**
     * network error, an empty response
     */
    public function testInvalidHttpResponseCodeException()
    {

        $cloud_payment_client = $this->createCloudPaymentClientException(
            new RequestException('Error', new Request('POST', '/'))
        );

        $this->expectException(InvalidHttpResponseCodeException::class);

        $cloud_payment_client->send($this->request);
    }

    /**
     * Authorisation Error
     */
    public function testInvalidHttpResponseCodeExceptionWithResponse()
    {
        $cloud_payment_client = $this->createCloudPaymentClientException(
            new RequestException('Error', new Request('POST', '/'), new Response(401))
        );

        $this->expectException(InvalidHttpResponseCodeException::class);

        $cloud_payment_client->send($this->request);
    }

    /**
     * @param array $raw_response
     * @param int   $status_code
     *
     * @return ClientInterface
     */
    protected function createCloudPaymentClient(array $raw_response,
                                                int $status_code = 200): ClientInterface
    {
        $http_client = $this->createHttpClientMock($raw_response, $status_code);

        $cloud_payment_client = new Client(
            $http_client,
            '',
            ''
        );

        return $cloud_payment_client;
    }

    /**
     * @param array $raw_response
     * @param int   $status_code
     *
     * @return MockObject|GuzzleHttpClientInterface
     */
    protected function createHttpClientMock(array $raw_response, int $status_code = 200)
    {
        $content = Json::encode($raw_response);

        $stream = $this->createMock(StreamInterface::class);
        $stream->method('getContents')
            ->willReturn($content);

        $psr_response = $this->createMock(ResponseInterface::class);
        $psr_response->method('getStatusCode')
            ->willReturn($status_code);

        $psr_response->method('getBody')
            ->willReturn($stream);

        $http_client = $this->createMock(GuzzleHttpClientInterface::class);
        $http_client->method('send')
            ->willReturn($psr_response);

        return $http_client;
    }

    protected function createCloudPaymentClientException(\Throwable $class_exception): ClientInterface
    {
        /** @var GuzzleHttpClientInterface $http_client */
        $http_client = $this->createHttpClientMockWithException($class_exception);

        $cloud_payment_client = new Client(
            $http_client,
            '',
            ''
        );

        return $cloud_payment_client;
    }

    /**
     * @param \Throwable $class_exception
     *
     * @return MockObject|GuzzleHttpClientInterface
     */
    protected function createHttpClientMockWithException(\Throwable $class_exception)
    {
        $http_client = $this->createMock(GuzzleHttpClientInterface::class);
        $http_client->method('send')
            ->willThrowException($class_exception);

        return $http_client;
    }
}
