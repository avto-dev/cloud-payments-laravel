<?php

declare(strict_types = 1);

namespace AvtoDev\Tests;

use AvtoDev\CloudPayments\ServiceProvider;
use AvtoDev\Tests\Traits\CreatesApplicationTrait;
use Illuminate\Foundation\Testing\TestCase;

abstract class AbstractTestCase extends TestCase
{
    use CreatesApplicationTrait;

    /**
     * {@inheritdoc}
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->app->register(ServiceProvider::class);
    }
}
