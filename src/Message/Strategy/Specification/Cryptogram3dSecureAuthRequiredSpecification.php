<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Strategy\Specification;

class Cryptogram3dSecureAuthRequiredSpecification implements SpecificationInterface
{
    /**
     * {@inheritdoc}
     */
    public function isSatisfiedBy(array $response): bool
    {
        return ! empty($response['Model']['AcsUrl']) &&
               (new NotSuccessSpecification)->isSatisfiedBy($response) &&
               (new NotMessageSpecification)->isSatisfiedBy($response);
    }
}
