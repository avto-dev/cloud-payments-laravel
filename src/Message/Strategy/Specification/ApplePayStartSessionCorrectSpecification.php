<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Strategy\Specification;

class ApplePayStartSessionCorrectSpecification implements SpecificationInterface
{
    /**
     * {@inheritdoc}
     */
    public function isSatisfiedBy(array $response): bool
    {
        return ! empty($response['Model']['merchantSessionIdentifier']) &&
               (new IsSuccessSpecification)->isSatisfiedBy($response) &&
               (new NotMessageSpecification)->isSatisfiedBy($response);
    }
}
