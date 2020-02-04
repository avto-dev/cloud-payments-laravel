<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit;

use Illuminate\Support\Str;
use AvtoDev\CloudPayments\Config;
use AvtoDev\Tests\AbstractTestCase;

/**
 * @covers \AvtoDev\CloudPayments\Config
 */
class ConfigTest extends AbstractTestCase
{
    public function test(): void
    {
        $config_array = [
            'api_key'   => Str::random(),
            'public_id' => Str::random(),
        ];

        $config = new Config($config_array['public_id'], $config_array['api_key']);

        $this->assertSame($config_array['api_key'], $config->getApiKey());
        $this->assertSame($config_array['public_id'], $config->getPublicId());
    }
}
