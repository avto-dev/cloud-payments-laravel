<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Receipts;

use AvtoDev\CloudPayments\References\Vat;
use AvtoDev\CloudPayments\References\PaymentType;
use AvtoDev\CloudPayments\References\PaymentObject;

/**
 * @see https://developers.cloudpayments.ru/#format-peredachi-dannyh-dlya-onlayn-cheka
 */
class Item
{
    /**
     * @var string|null
     */
    protected $label;

    /**
     * @var float|null
     */
    protected $price;

    /**
     * @var float|null
     */
    protected $quantity;

    /**
     * @var float|null
     */
    protected $amount;

    /**
     * @see Vat
     *
     * @var int|null
     */
    protected $vat;

    /**
     * @see PaymentType
     *
     * @var int|null
     */
    protected $method;

    /**
     * @see PaymentObject
     *
     * @var int|null
     */
    protected $object;

    /**
     * @var string|null
     */
    protected $measurement_unit;

    /**
     * @param string $label
     *
     * @return $this
     */
    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @param float $price
     *
     * @return $this
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @param float $quantity
     *
     * @return $this
     */
    public function setQuantity(float $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @param float $amount
     *
     * @return $this
     */
    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @param int $vat
     *
     * @return $this
     */
    public function setVat(int $vat): self
    {
        $this->vat = $vat;

        return $this;
    }

    /**
     * @param int $method
     *
     * @return $this
     */
    public function setMethod(int $method): self
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @param int $object
     *
     * @return $this
     */
    public function setObject(int $object): self
    {
        $this->object = $object;

        return $this;
    }

    /**
     * @param string $measurement_unit
     *
     * @return $this
     */
    public function setMeasurementUnit(string $measurement_unit): self
    {
        $this->measurement_unit = $measurement_unit;

        return $this;
    }

    /**
     * @return array<string,float|int|string|null>
     */
    public function toArray(): array
    {
        return \array_filter([
            'label'           => $this->label,
            'price'           => $this->price,
            'quantity'        => $this->quantity,
            'amount'          => $this->amount,
            'vat'             => $this->vat,
            'method'          => $this->method,
            'object'          => $this->object,
            'measurementUnit' => $this->measurement_unit,
        ], static function ($value) {
            return $value !== null;
        });
    }
}
