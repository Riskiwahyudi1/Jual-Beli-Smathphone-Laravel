<?php

namespace App\Services;

use GuzzleHttp\Client;

class RajaOngkirService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.rajaongkir.com/starter/',
        ]);
        $this->apiKey = env('RAJAONGKIR_API_KEY');
    }

    public function getProvinces()
    {
        $response = $this->client->request('GET', 'province', [
            'headers' => [
                'key' => $this->apiKey,
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
    public function getkota()
    {
        $response = $this->client->request('GET', 'city', [
            'headers' => [
                'key' => $this->apiKey,
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    // Tambahkan method lain untuk mendapatkan kota, kecamatan, dan tarif ongkir
}
