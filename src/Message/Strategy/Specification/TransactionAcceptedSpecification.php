<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Strategy\Specification;

/**
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class TransactionAcceptedSpecification implements SpecificationInterface
{
    /**
     * {@inheritdoc}
     */
    public function isSatisfiedBy(array $response): bool
    {
        return isset($response['Model']['ReasonCode']) &&
               $response['Model']['ReasonCode'] === 0 &&
               (new IsSuccessSpecification)->isSatisfiedBy($response) &&
               (new NotMessageSpecification)->isSatisfiedBy($response);
    }
}
