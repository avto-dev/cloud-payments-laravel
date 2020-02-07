<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Feature;

use AvtoDev\CloudPayments\Client;
use AvtoDev\CloudPayments\Config;
use AvtoDev\Tests\AbstractTestCase;
use Dotenv\Dotenv;

abstract class AbstractFeatureTestCase extends AbstractTestCase
{
    /**
     * @var Client
     */
    protected $cloud_payments_client;

    /**
     * @var string
     */
    protected $public_id;

    /**
     * @var string
     */
    protected $api_key;

    protected function setUp(): void
    {
        parent::setUp();

        if (method_exists(Dotenv::class, 'create')) {
            Dotenv::create(__DIR__ . '/../')->load();
        } else {
            (new Dotenv(__DIR__ . '/../'))->load();
        }

        $this->public_id = \getenv('CLOUD_PAYMENTS_PUBLIC_ID');
        $this->api_key   = \getenv('CLOUD_PAYMENTS_API_KEY');

        $this->cloud_payments_client = new Client(
            new \GuzzleHttp\Client,
            new Config($this->public_id, $this->api_key)
        );
    }
}
