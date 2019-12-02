<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments;

use GuzzleHttp\ClientInterface as GuzzleHttpClientInterface;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Container\Container;
use AvtoDev\CloudPayments\Client\Client;
use AvtoDev\CloudPayments\Client\ClientInterface;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->initializeConfigs();

        $this->app->bind(Client::class, function (Container $app) {
            $http_client = $app->make(GuzzleHttpClientInterface::class);
            /** @var Repository $config */
            $config = $app->make(Repository::class);

            return new Client(
                $http_client,
                $config->get(static::getConfigRootKeyName() . '.cloud_payments.public_key', ''),
                $config->get(static::getConfigRootKeyName() . '.cloud_payments.private_key', '')
            );
        });

        $this->app->bind(ClientInterface::class, Client::class);
    }

    /**
     * Returns path to the configuration file.
     *
     * @return string
     */
    public static function getConfigPath()
    {
        return __DIR__ . '/../config/services.php';
    }

    /**
     * Get config root key name.
     *
     * @return string
     */
    public static function getConfigRootKeyName()
    {
        return \basename(static::getConfigPath(), '.php');
    }

    /**
     * Initialize configs.
     *
     * @return void
     */
    protected function initializeConfigs(): void
    {
        $this->mergeConfigFrom(static::getConfigPath(), static::getConfigRootKeyName());
    }
}
