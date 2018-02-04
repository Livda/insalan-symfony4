<?php

declare(strict_types=1);

namespace App\Enum;

class Status extends Enum
{
    const CREATED = 'created';
    const ACTIVATED = 'activated';
    const DEACTIVATED = 'deactivated';

    const ALL_STATUS = [
        self::CREATED,
        self::ACTIVATED,
        self::DEACTIVATED,
    ];
}
