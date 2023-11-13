<?php

namespace App\Http\Controllers;

use App\Services\MoonService;

class MoonsController extends Controller
{
    /**
     * The moon service instance.
     */
    protected MoonService $moonService;

    /**
     * Create a new controller instance.
     *
     * @param \App\Services\MoonService $moonService
     *
     * @return void
     */
    public function __construct(MoonService $moonService)
    {
        $this->moonService = $moonService;
    }

    /**
     * Display the moons page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $moonData = $this->moonService->getNextXDaysMoonData();

        return view('moons.index', compact('moonData'));
    }
}
