<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Request\Model;

class NullModel extends AbstractModel
{
    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [];
    }
}
