<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Request\Model;

use AvtoDev\CloudPayments\Message\Traits\ModelField\PeriodInt;
use AvtoDev\CloudPayments\Message\Traits\ModelField\AmountFloat;
use AvtoDev\CloudPayments\Message\Traits\ModelField\EmailString;
use AvtoDev\CloudPayments\Message\Traits\ModelField\TokenString;
use AvtoDev\CloudPayments\Message\Traits\ModelField\CurrencyString;
use AvtoDev\CloudPayments\Message\Traits\ModelField\IntervalString;
use AvtoDev\CloudPayments\Message\Traits\ModelField\AccountIdString;
use AvtoDev\CloudPayments\Message\Traits\ModelField\StartDateString;
use AvtoDev\CloudPayments\Message\Traits\ModelField\DescriptionString;
use AvtoDev\CloudPayments\Message\Traits\ModelField\MaxPeriodsIntNull;
use AvtoDev\CloudPayments\Message\Traits\ModelField\RequireConfirmationBool;

/**
 * @see https://developers.cloudpayments.ru/#sozdanie-podpiski-na-rekurrentnye-platezhi
 */
class CreateSubscriptionModel extends AbstractModel
{
    use TokenString,
        AccountIdString,
        DescriptionString,
        EmailString,
        AmountFloat,
        CurrencyString,
        RequireConfirmationBool,
        StartDateString,
        IntervalString,
        PeriodInt,
        MaxPeriodsIntNull;

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'Token'               => $this->getToken(),
            'AccountId'           => $this->getAccountId(),
            'Description'         => $this->getDescription(),
            'Email'               => $this->getEmail(),
            'Amount'              => $this->getAmount(),
            'Currency'            => $this->getCurrency(),
            'RequireConfirmation' => $this->isRequireConfirmation(),
            'StartDate'           => $this->getStartDate(),
            'Interval'            => $this->getInterval(),
            'Period'              => $this->getPeriod(),
            'MaxPeriods'          => $this->getMaxPeriods(),
        ];
    }
}
