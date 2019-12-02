<?php

declare(strict_types = 1);

return [
    'cloud_payments' => [
        'public_key'  => env('CLOUD_PAYMENTS_PUBLIC_KEY', ''),
        'private_key' => env('CLOUD_PAYMENTS_PRIVATE_KEY', ''),
    ],
];
