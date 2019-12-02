<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Strategy\Specification;

/**
 * @see https://developers.cloudpayments.ru/#sozdanie-podpiski-na-rekurrentnye-platezhi
 */
class SubscriptionsSpecification implements SpecificationInterface
{
    /**
     * {@inheritdoc}
     */
    public function isSatisfiedBy(array $response): bool
    {
        return (new SubscriptionsInModelSpecification)->isSatisfiedBy($response) &&
               (new IsSuccessSpecification)->isSatisfiedBy($response) &&
               (new NotMessageSpecification)->isSatisfiedBy($response);
    }
}
