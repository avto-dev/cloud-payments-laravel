<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Feature;

use AvtoDev\CloudPayments\Client\Client;
use AvtoDev\Tests\AbstractTestCase;
use GuzzleHttp\Client as GuzzleHttpClient;
use Illuminate\Support\Arr;

abstract class AbstractFeatureTest extends AbstractTestCase
{
    /** @var Client */
    protected $client;

    /** @var array */
    protected $card_cryptograms;

    public function setUp(): void
    {
        parent::setUp();
        $config      = include __DIR__ . '/config.php';
        $public_key  = Arr::get($config, 'cloud_payments.public_key');
        $private_key = Arr::get($config, 'cloud_payments.private_key');

        $this->card_cryptograms = [
            'CARD_CRYPTOGRAM_PACKET_WITH_3D_SUCCESS'                => Arr::get($config,
                    'cloud_payments.CARD_CRYPTOGRAM_PACKET_WITH_3D_SUCCESS'),
            'CARD_CRYPTOGRAM_PACKET_WITH_3D_FAIL'                   => Arr::get($config,
                    'cloud_payments.CARD_CRYPTOGRAM_PACKET_WITH_3D_FAIL'),
            'CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_SUCCESS_VISA'        => Arr::get($config,
                    'cloud_payments.CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_SUCCESS_VISA'),
            'CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_SUCCESS_MASTER_CARD' => Arr::get($config,
                    'cloud_payments.CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_SUCCESS_MASTER_CARD'),
            'CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_FAIL'                => Arr::get($config,
                    'cloud_payments.CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_FAIL'),
        ];

        $this->client = new Client(
            new GuzzleHttpClient,
            //new Client(['http_errors' => false]),
            $public_key,
            $private_key
        );
    }
}
