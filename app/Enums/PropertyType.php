<?php

namespace App\Enums;

enum PropertyType: string
{
    case DETACHED = 'Detached';
    case SEMI_DETACHED = 'Semi-detached';
    case FLAT = 'Flat';
    case TERRACED = 'Terraced';
    case BUNGALOW = 'Bungalow';


    public function isDetached(): string
    {
        return $this === self::DETACHED;
    }

    public function isSemiDetached(): string
    {
        return $this === self::SEMI_DETACHED;
    }

    public function isFlat(): string
    {
        return $this === self::FLAT;
    }

    public function isTerraced(): string
    {
        return $this === self::TERRACED;
    }

    public function isBungalow(): string
    {
        return $this === self::BUNGALOW;
    }

    public function getLabelText(): string
    {
        return match ($this) {
            self::DETACHED => 'Detached',
            self::SEMI_DETACHED => 'Semi-detached',
            self::FLAT => 'Flat',
            self::TERRACED => 'Terraced',
            self::BUNGALOW => 'Bungalow'
        };
    }

}