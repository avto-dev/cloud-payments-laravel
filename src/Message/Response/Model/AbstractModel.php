<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Response\Model;

use AvtoDev\CloudPayments\Message\Traits\ModelFeature\FillObjectFromArray;

abstract class AbstractModel implements ModelInterface
{
    use FillObjectFromArray;
}
