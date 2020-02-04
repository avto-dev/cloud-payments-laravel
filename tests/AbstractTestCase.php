<?php

declare(strict_types = 1);

namespace AvtoDev\Tests;

use Illuminate\Foundation\Testing\TestCase;
use AvtoDev\Tests\Traits\CreatesApplicationTrait;

abstract class AbstractTestCase extends TestCase
{
    use CreatesApplicationTrait;
}
