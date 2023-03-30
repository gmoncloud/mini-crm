<?php

namespace App\Enums;

use Illuminate\Support\Collection;

enum    AddressableType: string
{
    case HOME = 'Home';
    case WORK = 'Work';
    case BUSINESS = 'Business';
    case SHIPPING = 'Shipping';
    case BILLING = 'Billing';
    case MAILING = 'Mailing';
    case PRIMARY = 'Primary';
    case SECONDARY = 'Secondary';

    public function isHome(): string
    {
        return $this === self::HOME;
    }

    public function isWork(): string
    {
        return $this === self::WORK;
    }

    public function isBusiness(): string
    {
        return $this === self::BUSINESS;
    }

    public function isShipping(): string
    {
        return $this === self::SHIPPING;
    }

    public function isBilling(): string
    {
        return $this === self::BILLING;
    }

    public function isMailing(): string
    {
        return $this === self::MAILING;
    }

    public function isPrimary(): string
    {
        return $this === self::PRIMARY;
    }

    public function isSecondary(): string
    {
        return $this === self::SECONDARY;
    }


    public static function getLabelText(): Collection
    {
        return collect(
            [
                self::HOME,
                self::WORK,
                self::BUSINESS,
                self::SHIPPING,
                self::BILLING,
                self::MAILING,
                self::PRIMARY,
                self::SECONDARY
            ]
        )->map(function($name) {
            return [
                'name' => $name,
                'value' => $name
            ];
        });
    }
}