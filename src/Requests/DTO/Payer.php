<?php

declare(strict_types=1);

namespace AvtoDev\CloudPayments\Requests\DTO;

/**
 * DTO with information about the payer
 */
class Payer
{
    /**
     * @var string|null
     */
    private $first_name;
    /**
     * @var string|null
     */
    private $last_name;

    /**
     * @var string|null
     */
    private $middle_name;

    /**
     * @var string|null
     */
    private $birth;

    /**
     * @var string|null
     */
    private $address;

    /**
     * @var string|null
     */
    private $street;

    /**
     * @var string|null
     */
    private $city;

    /**
     * @var string|null
     */
    private $country;

    /**
     * @var string|null
     */
    private $phone;

    /**
     * @var string|null
     */
    private $postcode;

    /**
     * @param string|null $first_name
     *
     * @return Payer
     */
    public function setFirstName(?string $first_name): Payer
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * @param string|null $last_name
     *
     * @return Payer
     */
    public function setLastName(?string $last_name): Payer
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * @param string|null $middle_name
     *
     * @return Payer
     */
    public function setMiddleName(?string $middle_name): Payer
    {
        $this->middle_name = $middle_name;

        return $this;
    }

    /**
     * @param string|null $birth
     *
     * @return Payer
     */
    public function setBirth(?string $birth): Payer
    {
        $this->birth = $birth;

        return $this;
    }

    /**
     * @param string|null $address
     *
     * @return Payer
     */
    public function setAddress(?string $address): Payer
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @param string|null $street
     *
     * @return Payer
     */
    public function setStreet(?string $street): Payer
    {
        $this->street = $street;

        return $this;
    }

    /**
     * @param string|null $city
     *
     * @return Payer
     */
    public function setCity(?string $city): Payer
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @param string|null $country
     *
     * @return Payer
     */
    public function setCountry(?string $country): Payer
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @param string|null $phone
     *
     * @return Payer
     */
    public function setPhone(?string $phone): Payer
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @param string|null $postcode
     *
     * @return Payer
     */
    public function setPostcode(?string $postcode): Payer
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * @return array<string,float|int|string|null>
     */
    public function toArray(): array
    {
        return \array_filter([
            'FirstName'  => $this->first_name, // TODO
            'LastName'   => $this->last_name,
            'MiddleName' => $this->middle_name,
            'Birth'      => $this->birth,
            'Address'    => $this->address,
            'Street'     => $this->street,
            'City'       => $this->city,
            'Country'    => $this->country,
            'Phone'      => $this->phone,
            'Postcode'   => $this->postcode
        ], static function ($value) {
            return $value !== null;
        });
    }
}
