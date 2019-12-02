<?php

declare(strict_types = 1);

namespace AvtoDev\Tests;

use Illuminate\Foundation\Testing\TestCase;
use AvtoDev\CloudPayments\ServiceProvider;
use AvtoDev\Tests\Traits\CreatesApplicationTrait;

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
