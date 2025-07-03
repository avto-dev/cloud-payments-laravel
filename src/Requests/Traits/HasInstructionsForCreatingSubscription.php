<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Requests\Traits;

use AvtoDev\CloudPayments\ValueObjects\SubscriptionParams;

trait HasInstructionsForCreatingSubscription
{
    protected ?SubscriptionParams $subscription_params = null;

    public function getSubscriptionParams(): ?SubscriptionParams
    {
        return $this->subscription_params;
    }

    public function setSubscriptionParams(SubscriptionParams $params): self
    {
        $this->subscription_params = $params;

        return $this;
    }
}
