<?php

declare(strict_types = 1);

return [
    'cloud_payments' => [
        'public_key'                                            => '',
        'private_key'                                           => '',

        # Карта MasterCard с 3-D Secure 	5555 5555 5555 4444 	Успешный результат
        'CARD_CRYPTOGRAM_PACKET_WITH_3D_SUCCESS'                => '',

        # Карта Visa с 3-D Secure 	4012 8888 8888 1881 	Недостаточно средств на карте
        'CARD_CRYPTOGRAM_PACKET_WITH_3D_FAIL'                   => '',

        # Карта Visa без 3-D Secure 	4111 1111 1111 1111 	Успешный результат
        'CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_SUCCESS_VISA'        => '',

        # Карта MasterCard без 3-D Secure 	5200 8282 8282 8210 	Успешный результат
        'CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_SUCCESS_MASTER_CARD' => '',

        # Карта MasterCard без 3-D Secure 	5404 0000 0000 0043 	Недостаточно средств на карте
        'CARD_CRYPTOGRAM_PACKET_WITHOUT_3D_FAIL'                => '',

    ],
];
