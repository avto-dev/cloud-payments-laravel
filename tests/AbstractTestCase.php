<?php

declare(strict_types = 1);

namespace AvtoDev\Tests;

use PHPUnit\Framework\TestCase;
use Faker\Factory as FakerFactory;
use Faker\Generator as FakerGenerator;

abstract class AbstractTestCase extends TestCase
{
    protected FakerGenerator $faker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->faker = FakerFactory::create();
    }
}
