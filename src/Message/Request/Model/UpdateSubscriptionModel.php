<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Request\Model;

use AvtoDev\CloudPayments\Message\Traits\ModelField\IdString;
use AvtoDev\CloudPayments\Message\Traits\ModelField\PeriodIntNull;
use AvtoDev\CloudPayments\Message\Traits\ModelField\AmountFloatNull;
use AvtoDev\CloudPayments\Message\Traits\ModelField\MaxPeriodsIntNull;
use AvtoDev\CloudPayments\Message\Traits\ModelField\CurrencyStringNull;
use AvtoDev\CloudPayments\Message\Traits\ModelField\IntervalStringNull;
use AvtoDev\CloudPayments\Message\Traits\ModelField\StartDateStringNull;
use AvtoDev\CloudPayments\Message\Traits\ModelField\DescriptionStringNull;
use AvtoDev\CloudPayments\Message\Traits\ModelField\CustomerReceiptStringNull;
use AvtoDev\CloudPayments\Message\Traits\ModelField\RequireConfirmationBoolNull;

/**
 * @see https://developers.cloudpayments.ru/#izmenenie-podpiski-na-rekurrentnye-platezhi
 */
class UpdateSubscriptionModel extends AbstractModel
{
    use IdString,
        DescriptionStringNull,
        AmountFloatNull,
        CurrencyStringNull,
        RequireConfirmationBoolNull,
        StartDateStringNull,
        IntervalStringNull,
        PeriodIntNull,
        MaxPeriodsIntNull,
        CustomerReceiptStringNull;

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'Id'                  => $this->getId(),
            'Description'         => $this->getDescription(),
            'Amount'              => $this->getAmount(),
            'Currency'            => $this->getCurrency(),
            'RequireConfirmation' => $this->isRequireConfirmation(),
            'StartDate'           => $this->getStartDate(),
            'Interval'            => $this->getInterval(),
            'Period'              => $this->getPeriod(),
            'MaxPeriods'          => $this->getMaxPeriods(),
            'CustomerReceipt'     => $this->getCustomerReceipt(),
        ];
    }
}
