<?php

declare(strict_types=1);

namespace App\Enum;

class Status
{
    const CREATED = 'created';
    const ACTIVATED = 'activated';
    const DEACTIVATED = 'deactivated';

    const ALL_STATUS = [
        self::CREATED,
        self::ACTIVATED,
        self::DEACTIVATED,
    ];

    public function getChoices()
    {
        return self::ALL_STATUS;
    }
}
