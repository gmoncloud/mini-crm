<?php

namespace App\Services;
class GeocodingService
{
    public function __construct(
        protected $accessToken
    ){}

    public function lookupCoordinates(string $address): ?array
    {
        $url = "https://api.mapbox.com/geocoding/v5/mapbox.places/" . urlencode($address) . ".json?access_token=" . $this->accessToken;
        $response = json_decode(file_get_contents($url), true);

        if ($response['features']) {
            $latitude = $response['features'][0]['center'][1];
            $longitude = $response['features'][0]['center'][0];
            return ['latitude' => $latitude, 'longitude' => $longitude];
        } else {
            return null;
        }
    }
}