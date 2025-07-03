<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\References;

enum PayersDevice: string
{
    case MobileApp  = 'MobileApp';
    case DesktopWeb = 'DesktopWeb';
    case Mobile     = 'Mobile';
}
