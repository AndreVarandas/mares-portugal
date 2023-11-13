<?php

namespace App\Services;

use Carbon\Carbon;
use GuzzleHttp\Client;

class MoonService
{
    protected $client;
    protected $baseUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->baseUrl = 'https://api.andandstudio.com/tide-pt/v1/moon';
    }

    /**
     * Get the next X days of moon data.
     *
     * @param int $daysToReturn
     *
     * @return array
     */
    public function getNextXDaysMoonData(int $daysToReturn = 4)
    {
        $currentDate = Carbon::now()->format('d-m-Y');

        try {
            $response = $this->client->request('GET', $this->baseUrl);
            $moonData = json_decode($response->getBody()->getContents(), true)['data'];
            $closestDayIndex = $this->findClosestDayIndex($moonData, $currentDate);

            return $this->enrichMoonData(array_slice($moonData, $closestDayIndex, $daysToReturn));
        } catch (\Throwable $th) {
            return [];
        }

        return [];
    }

    /**
     * Find the index of the closest day in the moon data.
     *
     * @param array $moonData
     *
     * @return int
     */
    protected function findClosestDayIndex($moonData, $currentDate)
    {
        $closestDayIndex = 0;
        $closestDayDiff = PHP_INT_MAX;

        foreach ($moonData as $index => $data) {
            $dayDiff = abs(strtotime($data['day']) - strtotime($currentDate));

            if ($dayDiff < $closestDayDiff) {
                $closestDayDiff = $dayDiff;
                $closestDayIndex = $index;
            }
        }

        return $closestDayIndex;
    }

    /**
     * Enrich the moon data with the moon emoji.
     *
     * @param array $moonData
     *
     * @return array
     */
    private function enrichMoonData($moonData)
    {
        foreach ($moonData as $index => $data) {
            $moonData[$index]['emoji'] = $this->getMoonEmoji($data['desc_en']);
        }

        return $moonData;
    }

    /**
     * Get the moon emoji based on the moon description.
     *
     * @param string $moonDesc
     *
     * @return string
     */
    private function getMoonEmoji($moonDesc)
    {
        switch ($moonDesc) {
            case 'New moon':
                return '🌑';
                break;
            case 'Waxing Crescent':
                return '🌒';
                break;
            case 'First quarter':
                return '🌓';
                break;
            case 'Waxing Gibbous':
                return '🌔';
                break;
            case 'Full moon':
                return '🌕';
                break;
            case 'Waning Gibbous':
                return '🌖';
                break;
            case 'Last Quarter' || 'Third quarter':
                return '🌗';
                break;
            case 'Waning Crescent':
                return '🌘';
                break;
            default:
                return '🌑';
                break;
        }
    }
}
