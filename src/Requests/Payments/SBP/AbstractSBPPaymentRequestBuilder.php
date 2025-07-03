<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Requests\Payments\SBP;

use AvtoDev\CloudPayments\References\PayersDevice;
use AvtoDev\CloudPayments\Requests\Traits\HasReceipt;
use AvtoDev\CloudPayments\Requests\AbstractRequestBuilder;
use AvtoDev\CloudPayments\ValueObjects\SubscriptionParams;
use AvtoDev\CloudPayments\Requests\Traits\PaymentRequestTrait;
use AvtoDev\CloudPayments\Requests\Traits\HasInstructionsForCreatingSubscription;

/**
 * @link https://developers.cloudpayments.ru/#sbp-poluchenie-ssylki-dlya-oplaty
 */
abstract class AbstractSBPPaymentRequestBuilder extends AbstractRequestBuilder
{
    use PaymentRequestTrait, HasReceipt, HasInstructionsForCreatingSubscription;

    private const MIN_LINK_TTL_IN_MINUTES = 1;
    private const MAX_LINK_TTL_IN_MINUTES = 129_600;

    private ?string $success_redirect_url = null;
    private ?string $os = null;
    private ?PayersDevice $device = null;
    private ?string $browser = null;
    private ?int $ttl_in_minutes = null;
    private bool $is_webview = false;
    private bool $need_save_card = false;
    private bool $is_test = false;

    public function setSuccessRedirectUrl(?string $success_redirect_url): self
    {
        $this->success_redirect_url = $success_redirect_url;

        return $this;
    }

    /**
     * $os value examples: Android, iOS, Windows.
     */
    public function setOs(?string $os): self
    {
        $this->os = $os;

        return $this;
    }

    public function setDevice(?PayersDevice $device): self
    {
        $this->device = $device;

        return $this;
    }

    /**
     * $browser value examples: Chrome, Firefox, MIUI Browser, Opera.
     */
    public function setBrowser(?string $browser): self
    {
        $this->browser = $browser;

        return $this;
    }

    /**
     * @param int|null $ttl_in_minutes Value must be between 1 and 129600
     *
     * @return self
     *
     * @throws \InvalidArgumentException
     */
    public function setTtlInMinutes(?int $ttl_in_minutes): self
    {
        if (\is_int($ttl_in_minutes) && ($ttl_in_minutes < self::MIN_LINK_TTL_IN_MINUTES || $ttl_in_minutes > self::MAX_LINK_TTL_IN_MINUTES)) {
            throw new \InvalidArgumentException('TTL must be between 1 and 129600 minutes');
        }

        $this->ttl_in_minutes = $ttl_in_minutes;

        return $this;
    }

    public function setIsWebview(bool $is_webview): self
    {
        $this->is_webview = $is_webview;

        return $this;
    }

    public function setNeedSaveCard(bool $need_save_card): self
    {
        $this->need_save_card = $need_save_card;

        return $this;
    }

    public function setIsTest(bool $is_test): self
    {
        $this->is_test = $is_test;

        return $this;
    }

    /**
     * @inheritdoc
     */
    protected function getRequestPayload(): array
    {
        $subscription_params      = $this->getSubscriptionParams();
        $subscription_params_data = $subscription_params instanceof SubscriptionParams
            ? [
                'cloudPayments' => [
                    'recurrent' => $subscription_params->toArray(),
                ],
            ]
            : [];

        $this->setJsonData(\array_merge_recursive(
            $this->json_data ?? [],
            $this->getReceiptData(),
            $subscription_params_data,
        ));

        return array_merge(
            $this->getCommonPaymentParams(),
            [
                'Scheme'             => 'charge', // charge - single-stage payment
                'SuccessRedirectUrl' => $this->success_redirect_url,
                'Os'                 => $this->os,
                'Device'             => $this->device,
                'Browser'            => $this->browser,
                'TtlMinutes'         => $this->ttl_in_minutes,
                'Webview'            => $this->is_webview,
                'SaveCard'           => $this->need_save_card,
                'IsTest'             => $this->is_test,
            ],
        );
    }
}
