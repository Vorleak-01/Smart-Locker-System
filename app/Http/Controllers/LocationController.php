<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function search()
    {
        $locations = Location::withCount(['lockers as free_count' => function ($q) {
            $q->where('status', 'available');
        }])->get();

        return view('user.locations.search', compact('locations'));
    }

    public function show(Location $location)
    {
        $lockers = $location->lockers;

        $available = $lockers->where('status', 'available')->count();
        $inUse = $lockers->where('status', 'in_use')->count();
        $maintenance = $lockers->where('status', 'maintenance')->count();

        return view('user.locations.show', compact('location', 'available', 'inUse', 'maintenance'));
    }

    public function lockers(Location $location)
    {
        $lockers = $location->lockers;

        return view('user.locations.lockers', compact('location', 'lockers'));
    }

    public function index()
    {
        $locations = Location::withCount('lockers')->get();

        return view('user.locations.index', compact('locations'));
    }

    public function userIndex()
    {
        $locations = Location::withCount(['lockers as free_count' => function ($q) {
            $q->where('status', 'available');
        }])->get();

        return view('user.locations.search', compact('locations'));
    }
}