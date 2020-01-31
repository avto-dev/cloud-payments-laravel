<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit;

use AvtoDev\CloudPayments\Config;
use AvtoDev\Tests\AbstractTestCase;
use Illuminate\Support\Str;

/**
 * @covers \AvtoDev\CloudPayments\Config
 */
class ConfigTest extends AbstractTestCase
{
    public function test()
    {
        $config_array = [
            'api_key'   => Str::random(),
            'public_id' => Str::random(),
        ];

        $config = new Config($config_array);

        $this->assertSame($config_array['api_key'], $config->getApiKey());
        $this->assertSame($config_array['public_id'], $config->getPublicId());
    }
}
