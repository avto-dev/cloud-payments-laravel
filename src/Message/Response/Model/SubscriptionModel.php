<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Response\Model;

use AvtoDev\CloudPayments\Message\Traits\ModelField\IdString;
use AvtoDev\CloudPayments\Message\Traits\ModelField\PeriodInt;
use AvtoDev\CloudPayments\Message\Traits\ModelField\AmountFloat;
use AvtoDev\CloudPayments\Message\Traits\ModelField\EmailString;
use AvtoDev\CloudPayments\Message\Traits\ModelField\StatusString;
use AvtoDev\CloudPayments\Message\Traits\ModelField\StatusCodeInt;
use AvtoDev\CloudPayments\Message\Traits\ModelField\CurrencyString;
use AvtoDev\CloudPayments\Message\Traits\ModelField\IntervalString;
use AvtoDev\CloudPayments\Message\Traits\ModelField\AccountIdString;
use AvtoDev\CloudPayments\Message\Traits\ModelField\CurrencyCodeInt;
use AvtoDev\CloudPayments\Message\Traits\ModelField\IntervalCodeInt;
use AvtoDev\CloudPayments\Message\Traits\ModelField\StartDateString;
use AvtoDev\CloudPayments\Message\Traits\ModelField\DescriptionString;
use AvtoDev\CloudPayments\Message\Traits\ModelField\MaxPeriodsIntNull;
use AvtoDev\CloudPayments\Message\Traits\ModelField\StartDateIsoString;
use AvtoDev\CloudPayments\Message\Traits\ModelField\CultureNameStringNull;
use AvtoDev\CloudPayments\Message\Traits\ModelField\RequireConfirmationBool;
use AvtoDev\CloudPayments\Message\Traits\ModelField\FailedTransactionsNumberInt;
use AvtoDev\CloudPayments\Message\Traits\ModelField\LastTransactionDateStringNull;
use AvtoDev\CloudPayments\Message\Traits\ModelField\NextTransactionDateStringNull;
use AvtoDev\CloudPayments\Message\Traits\ModelField\SuccessfulTransactionsNumberInt;
use AvtoDev\CloudPayments\Message\Traits\ModelField\LastTransactionDateIsoStringNull;
use AvtoDev\CloudPayments\Message\Traits\ModelField\NextTransactionDateIsoStringNull;

/**
 * @see https://developers.cloudpayments.ru/#sozdanie-podpiski-na-rekurrentnye-platezhi
 * @see https://developers.cloudpayments.ru/#zapros-informatsii-o-podpiske
 * @see https://developers.cloudpayments.ru/#izmenenie-podpiski-na-rekurrentnye-platezhi
 */
class SubscriptionModel extends AbstractModel
{
    use IdString,
        AccountIdString,
        DescriptionString,
        EmailString,
        AmountFloat,
        CurrencyCodeInt,
        CurrencyString,
        RequireConfirmationBool,
        StartDateString,
        StartDateIsoString,
        IntervalCodeInt,
        IntervalString,
        PeriodInt,
        MaxPeriodsIntNull,
        CultureNameStringNull,
        StatusCodeInt,
        StatusString,
        SuccessfulTransactionsNumberInt,
        FailedTransactionsNumberInt,
        LastTransactionDateStringNull,
        LastTransactionDateIsoStringNull,
        NextTransactionDateStringNull,
        NextTransactionDateIsoStringNull;

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'Id'                           => $this->getId(),
            'AccountId'                    => $this->getAccountId(),
            'Description'                  => $this->getDescription(),
            'Email'                        => $this->getEmail(),
            'Amount'                       => $this->getAmount(),
            'CurrencyCode'                 => $this->getCurrencyCode(),
            'Currency'                     => $this->getCurrency(),
            'RequireConfirmation'          => $this->isRequireConfirmation(),
            'StartDate'                    => $this->getStartDate(),
            'StartDateIso'                 => $this->getStartDateIso(),
            'IntervalCode'                 => $this->getIntervalCode(),
            'Interval'                     => $this->getInterval(),
            'Period'                       => $this->getPeriod(),
            'MaxPeriods'                   => $this->getMaxPeriods(),
            'CultureName'                  => $this->getCultureName(),
            'StatusCode'                   => $this->getStatusCode(),
            'Status'                       => $this->getStatus(),
            'SuccessfulTransactionsNumber' => $this->getSuccessfulTransactionsNumber(),
            'FailedTransactionsNumber'     => $this->getFailedTransactionsNumber(),
            'LastTransactionDate'          => $this->getLastTransactionDate(),
            'LastTransactionDateIso'       => $this->getLastTransactionDate(),
            'NextTransactionDate'          => $this->getNextTransactionDate(),
            'NextTransactionDateIso'       => $this->getNextTransactionDateIso(),
        ];
    }
}
