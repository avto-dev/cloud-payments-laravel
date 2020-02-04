<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments;

use Psr\Http\Client\ClientInterface;
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
        $this->registerConfig();
    }

    public function registerService(): void
    {
        $this->app->bind(Client::class, function (Container $app) {
            if ($app->bound(ClientInterface::class)) {
                $client = $app->make(ClientInterface::class);
            } else {
                $client = $app->make(GuzzleClient::class);
            }

            /** @var Config $config */
            $config = $app->make(Config::class);

            return new Client($client, $config);
        });
    }

    public function registerConfig(): void
    {
        $this->app->bind(Config::class, function (Container $app) {
            /** @var Repository $config_repository */
            $config_repository = $app->make(Repository::class);

            $config_data = $config_repository->get('services.cloud_payments');

            return new Config($config_data['public_id'], $config_data['api_key']);
        });
    }
}
