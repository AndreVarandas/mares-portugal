<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MoonsController extends Controller
{
    /**
     * Display the moons page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('moons.index');
    }
}
