<?php

declare(strict_types=1);

namespace AvtoDev\CloudPayments\References;

/**
 * @see https://developers.cloudpayments.ru/#statusy-podpisok-rekurrent
 */
interface SubscriptionStatus
{
    /**
     * Subscription statuses.
     */
    public const
        ACTIVE = 'Active', // When subscription is created and/or payment by subscription is done
        PAST_DUE = 'PastDue', // After one or two consecutive unsuccessful payment attempts
        CANCELLED = 'Cancelled', // In case of cancellation upon request
        REJECTED = 'Rejected', // In the case of three unsuccessful back-to-back payment attempts
        EXPIRED = 'Expired'; // In case of completion of the maximum number of periods (if specified)
}
