<?php

namespace App\Enums;

enum PropertyType: string
{
    case SINGLE_FAMILY_HOME = 'Single Family Home';
    case TOWN_HOUSE = 'Townhouse';
    case CONDOMINIUM = 'Condominium';
    case APARTMENT = 'Apartment';
    case DUPLEX = 'Duplex';
    case OFFICE = 'Office';


    public function isSingleFamilyHome(): string
    {
        return $this === self::SINGLE_FAMILY_HOME;
    }

    public function isTownHouse(): string
    {
        return $this === self::TOWN_HOUSE;
    }

    public function isCondominium(): string
    {
        return $this === self::CONDOMINIUM;
    }

    public function isApartment(): string
    {
        return $this === self::APARTMENT;
    }

    public function isDuplex(): string
    {
        return $this === self::DUPLEX;
    }

    public function isOffice(): string
    {
        return $this === self::OFFICE;
    }

    public function getLabelText(): string
    {
        return match ($this) {
            self::SINGLE_FAMILY_HOME => 'Single Family Home',
            self::TOWN_HOUSE => 'Townhouse',
            self::CONDOMINIUM => 'Condominium',
            self::APARTMENT => 'Apartment',
            self::DUPLEX => 'Duplex',
            self::OFFICE => 'Office'
        };
    }

}