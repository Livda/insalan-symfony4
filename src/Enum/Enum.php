<?php

declare(strict_types=1);

namespace App\Enum;

class Enum extends \MyCLabs\Enum\Enum
{
    public static function getConstants()
    {
        $oClass = new \ReflectionClass(static::class);

        return $oClass->getConstants();
    }
}
