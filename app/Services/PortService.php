<?php

namespace App\Services;

use Carbon\Carbon;
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
            return [];
        }
    }

    /**
     * Get the port data for a specific date.
     *
     * @param string $date
     *
     * @return array
     */
    public function getPortDataByDate($date)
    {
        try {
            $response = $this->client->request('GET', $this->baseUrl . $date);
            $data = json_decode($response->getBody()->getContents(), true);
            $filteredData = [];

            foreach ($data['data'] as $tide) {
                $tideTime = Carbon::createFromFormat('d-m-Y H\hi', $tide['day'] . ' ' . $tide['hour']);

                // Check if the tide time is in the future
                if ($tideTime->isFuture()) {
                    $filteredData[] = $tide;
                }
            }

            return $filteredData;
        } catch (\Throwable $th) {
            return [];
        }
    }
}
