<?php

namespace App\Services;

use Illuminate\Http\Request;

class UserLocationService
{
    public function fetchUserCoordinates(Request $request)
    {
        $userIP = $request->ip();

        // Retrieve the location data for the user's IP
        $locationData = geoip()->getLocation($userIP);

        $userLatitude = $locationData['lat'];
        $userLongitude = $locationData['lon'];

        return [$userLatitude, $userLongitude];
    }
}
