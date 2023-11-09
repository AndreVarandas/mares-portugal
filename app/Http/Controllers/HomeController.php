<?php

namespace App\Http\Controllers;

use App\Services\PortService;
use App\Services\TideService;
use App\Services\UserLocationService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var PortService
     */
    protected $portService;

    /**
     * @var TideService
     */
    protected $tideService;

    /**
     * @var UserLocationService
     */
    protected $userLocationService;

    /**
     * HomeController constructor.
     *
     * @param PortService $portService
     */
    public function __construct(PortService $portService, TideService $tideService, UserLocationService $userLocationService)
    {
        $this->portService = $portService;
        $this->tideService = $tideService;
        $this->userLocationService = $userLocationService;
    }

    /**
     * Display the home page with closest port data.
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $requestedPort = $request->query('port');
        $allPorts = $this->portService->retrieveAllPorts();

        if ($requestedPort) {
            $selectedPort = $this->portService->getPortDataForSpecificPort($allPorts, $requestedPort);
        } else {
            [$userLatitude, $userLongitude] = $this->userLocationService->fetchUserCoordinates($request);
            $closestPort = $this->portService->findClosestPort($allPorts, $userLatitude, $userLongitude);
            $selectedPort = $this->portService->getPortDataForSpecificPort($allPorts, $closestPort['port']);
        }

        $portNames = $this->portService->retrieveAllPortNames($allPorts);
        $currentTide = $this->tideService->estimateCurrentTide($selectedPort);

        return view('home', compact('selectedPort', 'portNames', 'currentTide'));
    }
}
