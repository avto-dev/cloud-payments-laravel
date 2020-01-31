<?php

declare(strict_types = 1);

namespace AvtoDev\Tests;

use AvtoDev\Tests\Traits\CreatesApplicationTrait;
use Illuminate\Foundation\Testing\TestCase;

abstract class AbstractTestCase extends TestCase
{
    use CreatesApplicationTrait;
}
