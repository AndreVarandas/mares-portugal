<?php

namespace App\Http\Controllers;

use App\Models\Port;
use App\Services\PortService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var PortService
     */
    private $portService;

    /**
     * HomeController constructor.
     *
     * @param PortService $portService
     */
    public function __construct(PortService $portService)
    {
        $this->portService = $portService;
    }

    /**
     * Display the home page with closest port data.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $userLatitude = $request->session()->get('userLatitude');
        $userLongitude = $request->session()->get('userLongitude');
        $requestedPort = $request->query('port');

        $ports = $this->portService->getPortData();

        if ($requestedPort) {
            $selectedPort = $this->fetchPortData($ports, $requestedPort);
        } else {
            $this->setDefaultUserLocation($request, $userLatitude, $userLongitude);

            $closestPort = $this->findClosestPort($ports, $userLatitude, $userLongitude);
            $selectedPort = $this->fetchPortData($ports, $closestPort['port']);
        }

        $portNames = Port::pluck('name')->toArray();

        $currentTide = $this->estimateCurrentTide($selectedPort);

        return view('home', compact('selectedPort', 'portNames', 'currentTide'));
    }

    /**
     * Estimate the current tide based on the closest time to the current time.
     *
     * @param array $ports
     *
     * @return array|null
     */
    private function estimateCurrentTide($ports)
    {
        $timeThresholdHigh = 20; // minutes before/after high tide
        $timeThresholdLow = -20; // minutes before/after low tide

        $currentTime = Carbon::now();
        $closestHighTide = null;
        $closestLowTide = null;

        foreach ($ports as $tide) {
            $tideTime = Carbon::createFromFormat('d-m-Y H\hi', $tide['day'] . ' ' . $tide['hour']);
            $timeDiff = $tideTime->diffInMinutes($currentTime, false);

            if ($timeDiff >= $timeThresholdLow && $timeDiff <= $timeThresholdHigh) {
                return $tide; // Tide has reached its final state
            }

            if ($timeDiff > $timeThresholdHigh && (!$closestHighTide || $timeDiff < $closestHighTide['timeDiff'])) {
                $closestHighTide = [
                    'timeDiff' => $timeDiff,
                    'tide' => [
                        'desc_en' => 'Rising Tide',
                        'height' => $tide['height'],
                        'hour' => $tide['hour']
                    ]
                ];
            }

            if ($timeDiff < $timeThresholdLow && (!$closestLowTide || abs($timeDiff) < abs($closestLowTide['timeDiff']))) {
                $closestLowTide = [
                    'timeDiff' => $timeDiff,
                    'tide' => [
                        'desc_en' => 'Falling Tide',
                        'height' => $tide['height'],
                        'hour' => $tide['hour']
                    ]
                ];
            }
        }

        return $closestHighTide ? $closestHighTide['tide'] : ($closestLowTide ? $closestLowTide['tide'] : null);
    }





    /**
     * Set the user's location in session storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function setUserLocation(Request $request)
    {
        $userLatitude = $request->input('userLatitude');
        $userLongitude = $request->input('userLongitude');

        $this->storeUserLocationInSession($request, $userLatitude, $userLongitude);

        return response()->json(['success' => true]);
    }

    /**
     * Find the closest port to the user's location.
     *
     * @param array $ports
     * @param float $userLatitude
     * @param float $userLongitude
     * @return array|null
     */
    private function findClosestPort($ports, $userLatitude, $userLongitude)
    {
        $earthRadius = 6371; // Earth's radius in kilometers
        $closestPort = null;
        $minDistance = PHP_INT_MAX;

        foreach ($ports as $port) {
            $matchingModelPort = Port::where('name', $port['port'])->first();

            if ($matchingModelPort) {
                $portLatitude = $matchingModelPort->latitude;
                $portLongitude = $matchingModelPort->longitude;

                // Calculate the distance between the user's location and port using Haversine formula
                $deltaLatitude = deg2rad($portLatitude - $userLatitude);
                $deltaLongitude = deg2rad($portLongitude - $userLongitude);

                $a = sin($deltaLatitude / 2) * sin($deltaLatitude / 2) + cos(deg2rad($userLatitude)) * cos(deg2rad($portLatitude)) * sin($deltaLongitude / 2) * sin($deltaLongitude / 2);
                $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
                $distance = $earthRadius * $c;

                // Update the closest port if a shorter distance is found
                if ($distance < $minDistance) {
                    $minDistance = $distance;
                    $closestPort = $port;
                }
            }
        }

        return $closestPort;
    }

    /**
     * Fetch port data based on the selected port name.
     *
     * @param array $portData
     * @param string $selectedPortName
     * @return array
     */
    private function fetchPortData($portData, $selectedPortName)
    {
        $filteredPorts = array_filter($portData, function ($port) use ($selectedPortName) {
            return $port['port'] === $selectedPortName;
        });

        return array_values($filteredPorts); // Re-index the array
    }

    /**
     * Set the default user location in session if not already set.
     *
     * @param Request $request
     * @param float $userLatitude
     * @param float $userLongitude
     */
    private function setDefaultUserLocation($request, $userLatitude, $userLongitude)
    {
        if (!$userLatitude || !$userLongitude) {
            $userLatitude = config('app.default_latitude');
            $userLongitude = config('app.default_longitude');

            $this->storeUserLocationInSession($request, $userLatitude, $userLongitude);
        }
    }

    /**
     * Store the user's location latitude and longitude in session.
     *
     * @param Request $request
     * @param float $userLatitude
     * @param float $userLongitude
     */
    private function storeUserLocationInSession($request, $userLatitude, $userLongitude)
    {
        $request->session()->put('userLatitude', $userLatitude);
        $request->session()->put('userLongitude', $userLongitude);
    }
}
