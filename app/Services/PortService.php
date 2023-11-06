<?php

namespace App\Services;

use GuzzleHttp\Client;

class PortService
{
    private $client;
    private $baseUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->baseUrl = 'https://api.andandstudio.com/tide-pt/v1/';
    }

    public function getPortData()
    {
        try {
            $response = $this->client->request('GET', $this->baseUrl);
            $data = json_decode($response->getBody()->getContents(), true);
            return $data['data'];
        } catch (\Throwable $th) {
            // You might want to throw an exception here or log the error instead of returning directly
            return [];
        }
    }

    public function getPortDataByDate($date)
    {
        try {
            $response = $this->client->request('GET', $this->baseUrl . $date);
            $data = json_decode($response->getBody()->getContents(), true);
            return $data['data'];
        } catch (\Throwable $th) {
            // You might want to throw an exception here or log the error instead of returning directly
            return [];
        }
    }
}
