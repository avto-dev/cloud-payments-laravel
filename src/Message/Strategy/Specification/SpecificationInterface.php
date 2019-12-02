<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Strategy\Specification;

interface SpecificationInterface
{
    /**
     * Is a satisfactory request for this specification
     *
     * @param array $response
     *
     * @return bool
     */
    public function isSatisfiedBy(array $response): bool;
}
