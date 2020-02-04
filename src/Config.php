<?php

namespace AvtoDev\CloudPayments;

class Config
{
    /**
     * @var string
     */
    protected $api_key;

    /**
     * @var string
     */
    protected $public_id;

    /**
     * Create new Config instance.
     *
     * @param string $public_id
     * @param string $api_key
     */
    public function __construct(string $public_id, string $api_key)
    {
        $this->public_id = $public_id;
        $this->api_key   = $api_key;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->api_key;
    }

    /**
     * @return string
     */
    public function getPublicId(): string
    {
        return $this->public_id;
    }
}
