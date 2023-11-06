<?php

namespace App\Http\Controllers;

use App\Models\Port;
use App\Services\PortService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $portService;

    public function __construct(PortService $portService)
    {
        $this->portService = $portService;
    }

    public function index(Request $request)
    {
        // Get user's latitude and longitude from session
        $userLatitude = $request->session()->get('userLatitude');
        $userLongitude = $request->session()->get('userLongitude');

        // Fetch all port data from the service
        $portData = $this->portService->getPortData();

        // Calculate the closest port based on user's location
        $closestPort = $this->findClosestPort($portData, $userLatitude, $userLongitude);

        // Filter port data to get all entries for the closest port
        $closestPortData = $this->filterClosestPortData($portData, $closestPort['port']);

        // Set storage the name of the port for the user
        $request->session()->put('closestPortName', $closestPort['port']);

        return view('home', compact('closestPortData'));
    }

    public function setUserLocation(Request $request)
    {
        $userLatitude = $request->input('userLatitude');
        $userLongitude = $request->input('userLongitude');

        // Store in session for user-specific data
        $request->session()->put('userLatitude', $userLatitude);
        $request->session()->put('userLongitude', $userLongitude);

        return response()->json(['success' => true]);
    }

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

    private function filterClosestPortData($portData, $closestPortName)
    {
        return array_filter($portData, function ($port) use ($closestPortName) {
            return $port['port'] === $closestPortName;
        });
    }
}
