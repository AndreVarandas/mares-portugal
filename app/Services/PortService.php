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

    /**
     * Retrieve all ports.
     *
     * @return array
     */
    public function retrieveAllPorts()
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
     * Retrieve all future tides for a specific port.
     *
     * @param string $date
     *
     * @return array
     */
    public function getFutureTides($date)
    {
        try {
            $response = $this->client->request('GET', $this->baseUrl . $date);
            $data = json_decode($response->getBody()->getContents(), true);

            return $this->filterFutureTides($data['data']);
        } catch (\Throwable $th) {
            return [];
        }
    }

    /**
     * Find the closest port to the user.
     *
     * @param array $ports
     * @param float $userLatitude
     * @param float $userLongitude
     *
     * @return array
     */
    public function findClosestPort($ports, $userLatitude, $userLongitude)
    {
        $closestPort = null;
        $minDistance = PHP_INT_MAX;

        foreach ($ports as $port) {
            $distance = $this->calculateDistance($userLatitude, $userLongitude, $port);

            if ($distance < $minDistance) {
                $minDistance = $distance;
                $closestPort = $port;
            }
        }

        return $closestPort;
    }

    /**
     * Retrieve all port names.
     *
     * @param array $ports
     *
     * @return array
     */
    public function retrieveAllPortNames($ports)
    {
        return array_unique(array_column($ports, 'port'));
    }

    /**
     * Get the port data for a specific port.
     *
     * @param array $ports
     * @param string $portName
     *
     * @return array
     */
    public function getPortDataForSpecificPort($ports, $portName)
    {
        return array_values(array_filter($ports, fn ($port) => $port['port'] === $portName));
    }

    /**
     * Filter out tides that are in the past.
     *
     * @param array $tides
     *
     * @return array
     */
    private function filterFutureTides($tides)
    {
        $futureTides = [];

        foreach ($tides as $tide) {
            $tideTime = Carbon::createFromFormat('d-m-Y H\hi', $tide['day'] . ' ' . $tide['hour']);

            if ($tideTime->addMinutes(30)->isFuture()) {
                $futureTides[] = $tide;
            }
        }

        return $futureTides;
    }

    /**
     * Calculate the distance between the user and a port.
     *
     * @param float $userLatitude
     * @param float $userLongitude
     * @param array $port
     *
     * @return float
     */
    private function calculateDistance($userLatitude, $userLongitude, $port)
    {
        $portLatitude = $port['lat'];
        $portLongitude = $port['lon'];

        $deltaLatitude = deg2rad($portLatitude - $userLatitude);
        $deltaLongitude = deg2rad($portLongitude - $userLongitude);

        $a = sin($deltaLatitude / 2) * sin($deltaLatitude / 2) + cos(deg2rad($userLatitude)) * cos(deg2rad($portLatitude)) * sin($deltaLongitude / 2) * sin($deltaLongitude / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $earthRadius = 6371; // Earth's radius in kilometers

        return $earthRadius * $c;
    }
}
