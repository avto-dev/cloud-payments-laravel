<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Strategy\Specification;

/**
 * @see https://developers.cloudpayments.ru/#vozvrat-deneg
 */
class RefundPaymentSpecification implements SpecificationInterface
{
    /**
     * {@inheritdoc}
     */
    public function isSatisfiedBy(array $response): bool
    {
        return ! empty($response['Model']['TransactionId']) &&
               (new IsSuccessSpecification)->isSatisfiedBy($response);
    }
}
