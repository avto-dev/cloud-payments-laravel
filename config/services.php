<?php

declare(strict_types = 1);

return [
    'cloud_payments' => [
        'public_id' => env('CLOUD_PAYMENTS_PUBLIC_ID', ''),
        'api_key'   => env('CLOUD_PAYMENTS_API_KEY', ''),
    ],
];
