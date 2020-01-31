<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments;

use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->registerService();
    }

    public function registerService(): void
    {
        $this->app->bind(Client::class, function (Container $app) {
            $client = $app->make(GuzzleClient::class);

            /** @var Repository $config_repository */
            $config_repository = $app->make(Repository::class);

            return new Client($client, new Config($config_repository->get('services.cloud_payments')));
        });
    }
}
