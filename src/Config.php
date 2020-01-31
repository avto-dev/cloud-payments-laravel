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

    public function __construct(array $config)
    {
        $this->api_key   = $config['api_key'];
        $this->public_id = $config['public_id'];
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
