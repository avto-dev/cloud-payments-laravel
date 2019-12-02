<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Response\Model;

class NullModel extends AbstractModel
{
    public function toArray()
    {
        return [];
    }
}
