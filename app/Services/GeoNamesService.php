<?php

namespace App\Services;

use GuzzleHttp\Client;

class GeoNamesService
{
    protected $client;
    protected $baseUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->baseUrl = 'http://api.geonames.org/';
    }

    public function getProvinces($countryCode)
    {
        $endpoint = 'searchJSON';
        $params = [
            'q' => $countryCode,
            'featureCode' => 'ADM1', // Filter by first-level administrative divisions (provinces)
            'username' => env('GEONAMES_USERNAME'),
        ];

        $response = $this->client->get($this->baseUrl . $endpoint, ['query' => $params]);

        if ($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody(), true);
            return $data['geonames'];
        }

        return [];
    }
}
