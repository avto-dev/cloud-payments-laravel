<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Response;

use AvtoDev\CloudPayments\Message\Response\Model\ApplePayStartSessionModel;
use AvtoDev\CloudPayments\Message\Response\Model\ModelInterface;

/**
 * @method ApplePayStartSessionModel getModel()
 *
 * @see https://developers.cloudpayments.ru/#zapusk-sessii-dlya-oplaty-cherez-apple-pay
 */
class ApplePayStartSessionResponse extends AbstractResponse
{
    /**
     * {@inheritdoc}
     */
    public function createModel(): ModelInterface
    {
        return new ApplePayStartSessionModel;
    }
}
