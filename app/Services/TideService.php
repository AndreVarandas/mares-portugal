<?php

namespace App\Services;

use Carbon\Carbon;

class TideService
{
    /**
     * Estimate the current tide based on the closest time to the current time.
     *
     * @param array $ports
     *
     * @return array|null
     */
    public function estimateCurrentTide($ports)
    {
        $timeThresholdHigh = 20; // minutes before/after high tide
        $timeThresholdLow = -20; // minutes before/after low tide

        $currentTime = Carbon::now();
        $previousTide = null;

        foreach ($ports as $tide) {
            $tideTime = Carbon::createFromFormat('d-m-Y H\hi', $tide['day'] . ' ' . $tide['hour']);
            $timeDiff = $tideTime->diffInMinutes($currentTime, false);

            if ($timeDiff >= $timeThresholdLow && $timeDiff <= $timeThresholdHigh) {
                return $tide; // Tide has reached its final state
            }

            if ($timeDiff > $timeThresholdHigh) {
                if ($previousTide && $previousTide['desc_en'] === 'Low tide') {
                    return [
                        'desc_en' => 'Rising Tide',
                        'height' => $tide['height'],
                        'hour' => $tide['hour']
                    ];
                } else {
                    return [
                        'desc_en' => 'Falling Tide',
                        'height' => $tide['height'],
                        'hour' => $tide['hour']
                    ];
                }
            }

            $previousTide = $tide;
        }

        return null;
    }
}
