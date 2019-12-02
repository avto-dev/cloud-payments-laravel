<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Response;

use AvtoDev\CloudPayments\Message\Response\Model\ModelInterface;
use AvtoDev\CloudPayments\Message\Response\Model\NullModel;

/**
 * @method NullModel getModel()
 */
class InvalidRequestResponse extends AbstractResponse
{
    /**
     * {@inheritDoc}
     */
    public function createModel(): ModelInterface
    {
        return new NullModel;
    }
}
