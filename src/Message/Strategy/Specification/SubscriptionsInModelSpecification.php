<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Strategy\Specification;

/**
 * @see https://developers.cloudpayments.ru/#poisk-podpisok
 */
class SubscriptionsInModelSpecification implements SpecificationInterface
{
    /**
     * {@inheritDoc}
     */
    public function isSatisfiedBy(array $response): bool
    {
        if (! is_array($response['Model'])) {
            return false;
        }

        foreach ($response['Model'] as $item) {
            if (empty($item['Id'])) {
                return false;
            }
        }

        return true;
    }
}
