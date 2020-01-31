<?php

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

    public function setUp(): void
    {
        parent::setUp();

        $this->config = require __DIR__ . '/config.php';

        $this->cloud_payments_client = Client::factory(new Config($this->config['cloud_payments']));
    }
}
