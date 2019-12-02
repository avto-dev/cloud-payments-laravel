<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Strategy\Specification;

/**
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class TransactionRejectedSpecification implements SpecificationInterface
{
    /**
     * {@inheritdoc}
     */
    public function isSatisfiedBy(array $response): bool
    {
        return ! empty($response['Model']['ReasonCode']) &&
               (new NotSuccessSpecification)->isSatisfiedBy($response);
    }
}
