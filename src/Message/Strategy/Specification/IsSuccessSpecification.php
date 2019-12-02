<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Strategy\Specification;

class IsSuccessSpecification implements SpecificationInterface
{
    /**
     * {@inheritdoc}
     */
    public function isSatisfiedBy(array $response): bool
    {
        return isset($response['Success']) && $response['Success'] === true;
    }
}
