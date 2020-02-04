<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Feature;

use AvtoDev\CloudPayments\Client;
use AvtoDev\CloudPayments\Config;
use AvtoDev\Tests\AbstractTestCase;

abstract class AbstractFeatureTestCase extends AbstractTestCase
{
    /**
     * @var Client
     */
    protected $cloud_payments_client;

    /**
     * @var array
     */
    protected $config = [];

    protected function setUp(): void
    {
        parent::setUp();

        $this->config = require __DIR__ . '/config.php';

        $this->cloud_payments_client = new Client(
            new \GuzzleHttp\Client,
            new Config($this->config['cloud_payments']['public_id'], $this->config['cloud_payments']['api_key'])
        );
    }
}
